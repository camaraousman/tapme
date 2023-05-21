<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = User::whereId(Auth::id())->first();
        return view('dashboard', $user);
    }

    public function fetch_all(){

    }

    public function barcode(){
        $user = User::whereId(Auth::id())->first();
        return view('barcode', $user);
    }

    public function contacts(){
        return view('contacts');
    }
    public function media(){
        return view('media');
    }

}
