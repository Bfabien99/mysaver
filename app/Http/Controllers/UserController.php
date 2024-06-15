<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function dashboardPage(){
        return view('user.dashboard');
    }
    public function logout(){
        auth()->logout();
        request()->session()->regenerateToken();
        return to_route('login');
    }
}
