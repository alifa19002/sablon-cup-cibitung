<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title = "My Profile";
        $user_id = Auth::user()->id;
        $profilUser = User::where('id', $user_id)->first();
        // $my_order = Order::where('user_id', $user_id)->get();
        $my_orders = Order::select('orders.id', 'orders.design', 'orders.quantity', 'orders.address', 'orders.status', 'orders.note', 'products.productName', 'payments.delivery_fee', 'payments.total_price', 'payments.dp_proof', 'payments.payment_proof')
            ->join('products', 'products.id', '=', 'orders.product_id')->join('payments', 'payments.order_id', '=', 'orders.id')
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
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 1) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function edit($username)
    {
        return view('users.edit', [
            'title' => 'Edit Profile',
            'active' => 'Edit Profile',
            'profilUser' => User::where('username', $username)->first()
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
