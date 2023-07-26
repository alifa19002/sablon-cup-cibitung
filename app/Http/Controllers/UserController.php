<?php

namespace App\Http\Controllers;

use App\Models\DeliveryType;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title = "My Profile";
        $user_id = Auth::user()->id;
        $profilUser = User::where('id', $user_id)->first();
        $my_orders = Order::select('orders.id', 'orders.design', 'orders.quantity', 'orders.address', 'orders.design', 'orders.status', 'orders.note', 'products.productName', 'payments.delivery_fee', 'payments.total_price', 'payments.dp_proof', 'payments.payment_proof', 'delivery_types.type', Payment::raw('IFNULL(payments.delivery_fee + payments.total_price, payments.total_price) as total') )
            ->join('products', 'products.id', '=', 'orders.product_id')->join('payments', 'payments.order_id', '=', 'orders.id')->join('delivery_types', 'delivery_types.id', '=', 'payments.delivery_id')
            ->where('orders.user_id', $user_id)
            ->orderBy('orders.id', 'DESC')->get();
        return view('users.profile', compact(['title', 'profilUser', 'my_orders']));
    }
    
    public function login()
    {
        return view('users.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

            if (Auth::attempt(['username' => $request->login, 'password' => $request->password]) || Auth::attempt(['no_telp' => $request->login, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (Auth::user()->role == 1) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->with('loginError', 'Login failed!');
    }
    
    // public function username()
    // {
    // return 'username';
    // }
    

    public function edit($username)
    {
        return view('users.edit', [
            'title' => 'Edit Profile',
            'active' => 'Edit Profile',
            'profilUser' => User::where('username', $username)->first()
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->user()->id;
        $profilUser = User::where('id', $id)->first();
        $rules = [
            'nama' => 'required|max:255',
            'alamat' => 'max:255'
        ];

        if ($request->username != $profilUser->username) {
            $rules['username'] = 'required|min:3|max:255|unique:users';
            // $username = $request->input('username');
        }
        if ($request->email != $profilUser->email) {
            $rules['email'] = 'email:dns';
            // $email = $request->input('email');
        }
        if ($request->no_telp != $profilUser->no_telp) {
            $rules['no_telp'] = 'required|numeric|digits_between:10,14|unique:users';
        }
        
        if ($request->password != null) {
            $rules['password'] = 'required|min:3|max:255';
            // $rules['password'] = Hash::make($request->password);
        }
        $validatedData = $request->validate($rules);

        if ($request->password != null) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        if ($request->file('foto_profil')) {
            $uploadPath = public_path('storage/foto_profil');
            if (File::exists(public_path('storage/'.$profilUser->foto_profil))) {
                File::delete(public_path('storage/'.$profilUser->foto_profil));
            }
            $file = $request->file('foto_profil');
            $uniqueFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $uniqueFileName);
            $validatedData['foto_profil'] = 'foto_profil/' . $uniqueFileName;
            // $validatedData['foto_profil'] = $request->file('foto_profil')->store('foto-profil');
        }

        $validatedData['id'] = $id;
        User::where('id', $id)->update($validatedData);
        return redirect('/profile')->with('success', 'Profile updated!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
