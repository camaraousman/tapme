<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index(){
        return About::where('user_id', Auth::id())->first();
    }

    public function store(Request $request){
        $request->validate([
            'english_text' => 'required'
        ]);

        $data = [];
        $data['user_id'] = Auth::id();

        if($request->has('french_text')){
            $data['french_text'] = $request->french_text;
        }

        try {
            $about = About::where('user_id', Auth::id());
            $data['english_text'] = $request->english_text;
            if($about->exists()){
                $about->update($data);
            }else{
                About::create($data);
            }

        }catch (\Exception $ex){
            return response()->json([
                'status' => 0,
                'message' => $ex
            ]);
        }

        return response()->json([
            'status' => 1,
            'message' => ''.__('Updated successfully')
        ]);
    }
}
