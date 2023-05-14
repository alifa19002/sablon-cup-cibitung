<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.formorder', [
            'title' => 'Order',
            'active' => 'Order'
        ]);
    }
}
