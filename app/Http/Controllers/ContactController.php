<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(Request $request): View
    {
//        return view('contacts', [
//            'contacts' => DB::table('contacts')
//                ->where('name','LIKE',"%{$request['search-area']}%")
//                ->orWhere('position', 'LIKE',"%{$request['search-area']}%")
//                ->orWhere('company', 'LIKE',"%{$request['search-area']}%")
//                ->paginate(8)
//        ]);
        $q = $request['search-area'];
        $contacts = Contact::where('user_id', Auth::id())
            ->where(function($query) use ($q) {
                $query
                    ->where('name','LIKE',"%{$q}%")
                    ->orWhere('position', 'LIKE',"%{$q}%")
                    ->orWhere('company', 'LIKE',"%{$q}%");
            })
            ->paginate(8);

        return view('contacts', [
            'contacts' => $contacts
        ]);
    }

    public function get_contact(Request $request){
        return Contact::whereId($request->id)->first();
    }

    public function send_email(Request $request){
        $request->validate([
            'name' => 'required|max:40',
            'phone' => 'required|max:40',
            'email' => 'required|max:40',
            'position' => 'required|max:40',
            'company' => 'required|max:40',
        ]);

        $user = User::whereId($request->user_id)->first();
        $mailData = $request->all();
            $mailData['user'] = $user->first_name;

        try{
            Contact::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'position' => $request->position,
                'company' => $request->company,
                'user_id' => $request->user_id,
            ]);

            Mail::to($user->email)->send(new ContactForm($mailData));
        }catch (\Exception $ex){
            return response()->json([
                'message'   => 'Something went wrong!',
                'status' => 0
            ]);
        }

        return response()->json([
            'message' => ''.__('Message sent successfully'),
            'status' => 1
        ]);
    }
}
