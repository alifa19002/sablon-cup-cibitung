<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        return view('users.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $response = Http::asForm()->post('http://workforlife-be.my.id/api/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        $status = $response->status();
        if($status == 200){
            $response = $response->object();
            $token = $response->access_token;
            $role = $response->role;
            $id = $response->id;
            $company_id = $response->company_id;
            $username = $response->username;
            $foto_profil = $response->foto_profil;
            session(['token' => $token]);
            session(['role' => $role]);
            session(['id' => $id]);
            session(['company_id' => $company_id]);
            session(['username' => $username]);
            session(['foto_profil' => $foto_profil]);
            return redirect()->intended('/');
        }
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        
    }
}
