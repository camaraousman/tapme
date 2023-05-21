<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index(){
        return response()->json(Website::where('user_id', Auth::id())->get());
    }

    public function store(Request $request){
        $user_id = Auth::id();

        DB::beginTransaction();
        try{
            $delete = Website::where('user_id', $user_id);

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
                Website::create([
                    'url' => $row['value'],
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
            'message' => 'Website info updated successfully'
        ]);
    }
}
