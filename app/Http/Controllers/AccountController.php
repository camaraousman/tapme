<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    public function index(){
        $users = User::whereId(Auth::id())->first();
        return view('account.account', $users);
    }

    public function fetch_all(){
        return User::whereId(Auth::id())->first();
    }

    public function upload(Request $request){
        $request->validate([
            'image' => 'required|max:2048',
        ]);

        $user = User::whereId(Auth::id())->first();

        if ($image = $request->file('image')) {
            $destinationPath = 'assets/profiles/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        }

        User::whereId(Auth::id())->update([
            'image' => $profileImage
        ]);

        if($user->image != 'profile.jpg')
            File::delete($destinationPath.'/'.$user->image);

        return response()->json(['status' => 1, 'message' => ''.__('Updated successfully')]);
    }

    public function basic_info(Request $request){
        $request->validate([
            'name' => 'required|min:2|max:20',
            'surname' => 'required|min:2|max:20'
        ]);

        $data = [];
        $data['first_name'] = $request->name;
        $data['last_name'] = $request->surname;
        $data['title'] = $request->title;
        $data['position'] = $request->position;
        $data['company'] = $request->company;
        $data['city'] = $request->city;
        $data['country'] = $request->country;

        User::whereId(Auth::id())->update($data);

        return response()->json(['status' => 1, 'message' => ''.__('Updated successfully')]);
    }

    public function update_password(Request $request){
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['status' => 1, 'message' => ''.__('Updated successfully')]);
    }

    public function profile_choice(Request $request){
        $request->validate([
            'profile' => 'required',
        ]);

        $profile = intval($request->profile);

        User::whereId(Auth::id())->update([
           'profile' => $profile
        ]);

        return response()->json(['status' => 1, 'message' => ''.__('Updated successfully')]);
    }

    public function language_choice(Request $request){
        $request->validate([
            'language' => 'required',
        ]);

        User::whereId(Auth::id())->update([
            'language' => $request->language
        ]);

        return response()->json(['status' => 1, 'message' => ''.__('Updated successfully')]);
    }

}
