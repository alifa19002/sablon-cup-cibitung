<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Sample;

class AdminController extends Controller
{
    public function index()
    {
        $title = "Dashboard Admin";
        $products = Product::orderBy('productName')->get();
        $samples = Sample::all();
        $orders = Order::select('orders.id', 'orders.design', 'orders.quantity', 'orders.address', 'orders.status', 'orders.note', 'products.productName', 'users.nama', 'users.no_telp', 'payments.delivery_id', 'payments.delivery_fee', 'payments.total_price', 'payments.dp_proof', 'payments.payment_proof')
            ->join('users', 'users.id', '=', 'orders.user_id')->join('products', 'products.id', '=', 'orders.product_id')->join('payments', 'payments.order_id', '=', 'orders.id')
            ->orderBy('orders.id', 'DESC')->get();

        // return view('admin.rekap', compact(['title', 'products', 'orders']));
        return view('admin.rekap', [
            'title' => $title,
            'products' => $products,
            'orders' => $orders,
            'samples' => $samples
        ]);
    }
}
