<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    public function index(){
        $data = [];

        $data['office_email'] = $this->get_emails(Auth::id(), 0);
        $data['personal_email'] = $this->get_emails(Auth::id(), 1);

        return response()->json($data);
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'type' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $email = Email::where('user_id', Auth::id())->where('type', $request->type);
            if($email->exists()){
                if($email->first()->type == $request->type && $email->first()->email == $request->email){
                    return response()->json([
                        'status' => -1,
                    ]);
                }

                $email->update([
                    'email' => $request->email,
                    'type' => $request->type,
                    'user_id' => Auth::id()
                ]);
            }else{
                Email::create([
                    'email' => $request->email,
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
    public function get_emails($user_id, $email_type){
        $email =  Email::where('user_id', $user_id)->where('type', $email_type)->first();

        if($email)
            return $email->email;

        return null;
    }
}
