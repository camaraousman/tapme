<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index(){
        $data = [];

        $address =  Address::where('user_id', Auth::id())->first();

        if(!$address)
            return response()->json($data);

        $data['address_text'] = $address->address;
        $data['address_url'] = $address->url;
        $data['has_map'] = $address->has_map;

        return response()->json($data);
    }

    public function store(Request $request){
        $request->validate([
            'address' => 'required|string|min:6'
        ]);

        DB::beginTransaction();
        try {
            $address = Address::where('user_id', Auth::id());
            if($address->exists()){
                if($address->first()->address == $request->address && $address->first()->url == $request->map_url){
                    return response()->json([
                        'status' => -1,
                    ]);
                }

                $address->update([
                    'address' => $request->address,
                    'user_id' => Auth::id()
                ]);

                if($request->map_url != null){
                    $address->update([
                        'url' => $request->map_url,
                        'has_map'   => 1
                    ]);
                }else{
                    $address->update([
                        'url' => null,
                        'has_map'   => 0
                    ]);
                }
            }else{
                $address = new Address();

                $address->address = $request->address;
                $address->user_id = Auth::id();

                if($request->map_url != null){
                    $address->url = $request->map_url;
                    $address->has_map = 1;
                }


                $address->save();
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

}
