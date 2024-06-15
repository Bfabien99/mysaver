<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function loginPage()
    {
        return view('auth.login');
    }
    public function login()
    {

        $req = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        try {
            if (!auth()->attempt($req)) {
                return back()->withInput()->with('error', 'Wrong credentials');
            }
            return to_route('dashboard');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function registerPage()
    {
        return view('auth.register');
    }
    public function register()
    {

        $req = request()->validate([
            'username' => 'required|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:50',
        ]);
        try {
            $is_user = User::first()?->toArray();
            if ($is_user) {
                return back()->withInput()->with('error', 'An user already exist');
            }
            User::create($req);
            return to_route('login');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }
}
