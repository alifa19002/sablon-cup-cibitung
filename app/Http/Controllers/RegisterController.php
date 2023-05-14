<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('users.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|unique:users',
            'no_telp' => 'required|numeric|digits_between:10,14|unique:users',
            'password' => 'required|min:5|max:50',
            'alamat' => 'required|max:255'
            // 'password_confirmation' => 'required|same:password'
        ]);

        // if ($validatedData->FALSE) {
        //     return response()->json([
        //       ‘errors’ => $validator->errors(), ‘status’ => 400,], 400);
        //   }
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        // $request->session()->flash('success', 'Registration successful, please login!');
        return redirect('/login')->with('success', 'Registration successful, please login!');
    }
}
