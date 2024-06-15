<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function dashboardPage(){
        return view('user.dashboard');
    }
    public function profilPage(){
        return view('user.profil');
    }
    public function editCredential(){
        $req = request()->validate([
            'email' => 'required|email',
            'username' => 'required|min:3|max:200',
        ]);
        try{
            User::where('username', auth()->user()->username)->first()->update([
                'email' => $req['email'],
                'username' => $req['username'],
            ]);
            return to_route('profil')->with('success', 'Information updated.');
        }catch(\Throwable $th){
            return back()->withInput()->with('error', $th->getMessage());
        }
    }
    public function editPassword(){
        $req = request()->validate([
            'password' => 'required|min:6|confirmed',
        ]);
        try{
            User::where('username', auth()->user()->username)->first()->update([
                'password' => $req['password'],
            ]);
            return to_route('profil')->with('success', 'Password updated.');
        }catch(\Throwable $th){
            return back()->withInput()->with('error', $th->getMessage());
        }
    }
    public function logout(){
        auth()->logout();
        request()->session()->regenerateToken();
        return to_route('login');
    }
}
