<?php

namespace App\Http\Controllers;

use App\Models\User;
use Doctrine\Inflector\Rules\NorwegianBokmal\Inflectible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function index($locale){
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public static function default_language(){
        if(Auth::user()){
            $language = User::whereId(Auth::id())->first()->language;
            App::setLocale($language);
        }
    }

}
