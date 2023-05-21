<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    public function index(){
        $data = [];

        $data['office_number'] = $this->get_phones(Auth::id(), 0);
        $data['mobile_number'] = $this->get_phones(Auth::id(), 1);

        return response()->json($data);
    }

    public function store(Request $request){
        $request->validate([
            'number' => 'required|numeric|min:6',
            'type' => 'required|numeric'
        ]);

        DB::beginTransaction();
        try {
            $phone = Phone::where('user_id', Auth::id())->where('type', $request->type);
            if($phone->exists()){
                if($phone->first()->type == $request->type && $phone->first()->number == $request->number){
                    return response()->json([
                        'status' => -1,
                    ]);
                }

                $phone->update([
                    'number' => $request->number,
                    'type' => $request->type,
                    'user_id' => Auth::id()
                ]);
            }else{
                Phone::create([
                    'number' => $request->number,
                    'type' => $request->type,
                    'user_id' => Auth::id()
                ]);
            }

            DB::commit();
        }catch (\Exception $ex){
            DB::rollBack();
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
    public function get_phones($user_id, $phone_type){
        $phone =  Phone::where('user_id', $user_id)->where('type', $phone_type)->first();

        if($phone)
            return $phone->number;

        return null;
    }
}
