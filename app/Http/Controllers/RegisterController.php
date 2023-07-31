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
        $validatedData = $request->validate(
            [
                'nama' => 'required|max:100',
                'email' => 'email:dns',
                'username' => 'required|unique:users',
                'no_telp' => 'required|numeric|digits_between:10,14|unique:users',
                'password' => 'required|min:5|max:50',
                'alamat' => 'max:80'
            ],
            [
                'max' => 'Maksimal :max karakter.',
                'min' => 'Minimal :min karakter.',
                'email.email' => 'Cantumkan email yang valid.',
                'unique' => 'Harus unik (belum pernah didaftarkan).',
                'no_telp.digits_between' => 'Nomor Telepon harus diantara :min - :max digit.',
                'numeric' => 'Harus berupa angka.'

            ]
        );
        $request->validate(
            ['password_confirmation' => 'required|same:password'],
            ['password_confirmation.same' => 'Password tidak sesuai.']
        );

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration successful, please login!');
    }
}
