<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    public function index(){
        $media = Media::where('user_id', Auth::id())->first();
        return view('media', $media);
    }

    public function upload_media_image(Request $request){
        $request->validate([
            'image' => 'required|max:2048',
            'column' => 'required',
        ]);

        $column = $request->column;

        $existing_image = Media::where('user_id', Auth::id())->first()->$column;

        if ($image = $request->file('image')) {
            $destinationPath = 'assets/catalogues/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        }

        Media::where('user_id', Auth::id())->update([
            $request->column => $profileImage
        ]);

        File::delete($destinationPath.'/'.$existing_image);
        return response()->json([
            'message' => ''.__('Updated successfully'),
            'status' => 1
        ]);
    }

    public function delete_media_image(Request $request){
        return $request->all();
        $column = 'image_'.intval($request->id);

        $update = Media::where('user_id', Auth::id())->update([
            $column => null
        ]);

        if($update == 1){
            return response()->json([
                'message' => ''.__('Updated successfully'),
                'status' => 1
            ]);
        }

        return response()->json([
            'message' => ''.__('Update unsuccessful'),
            'status' => 0
        ]);
    }
}
