<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    public function index(){
        try {
            $social = Social::where('user_id', Auth::id())->select('slug as key', 'url as value', 'username')->get();
            $array = json_decode(json_encode($social), true);
        }catch (\Exception $ex){
            return response()->json([
                'status' => 0,
                'message' => $ex
            ]);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Added',
            'data' => $array
        ]);
    }

    public function store(Request $request){
        $user_id = Auth::id();

        DB::beginTransaction();
        try{
            $delete = Social::where('user_id', $user_id);

            if($delete){
                $delete->delete();
            }
            //if array is empty, js wont send it at all
            if(!$request->has('table_arr')){
                DB::commit();
                return response()->json([
                    'status' => 2, //either nothing happened, or all accounts were deleted
                    'message' => 'nothing'
                ]);
            }

            $array = json_decode(json_encode($request->table_arr), true);

            foreach ($array as $row){
                if($row['key'] == 0)
                    continue;

                Social::create([
                    'slug' => $row['key'],
                    'username' => $row['username'],
                    'url'   => $row['value'],
                    'user_id'   =>  $user_id
                ]);
            }

        }catch (\Exception $ex){
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => $ex
            ]);
        }
        DB::commit();

        return response()->json([
            'status' => 1,
            'message' => ''.__('Updated successfully')
        ]);
    }
}
