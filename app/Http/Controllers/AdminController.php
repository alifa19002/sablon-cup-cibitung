<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $title = "Dashboard Admin";
        $product = Product::orderBy('productName')->get(); 
        $order = Order::select('orders.id', 'orders.design', 'orders.quantity', 'orders.address', 'orders.status', 'orders.note', 'products.productName', 'users.nama', 'users.no_telp', 'payments.delivery_fee', 'payments.total_price', 'payments.dp_proof', 'payments.payment_proof')
            ->join('users', 'users.id', '=', 'orders.user_id')->join('products', 'products.id', '=', 'orders.product_id')->join('payments', 'payments.order_id', '=', 'orders.id')
            ->orderBy('orders.id', 'DESC')->get();

        return view('admin.rekap', compact(['title', 'product', 'order']));
        // return view('event.events', [
        //     'title' => 'All Events' . $title,
        //     'active' => 'events',
        //     'categories' => Category::all(),
        //     'events' => Event::latest()->where('status_event', "Accepted")->filter(request(['search', 'category']))->paginate(10)->withQueryString()
        // ]);
    }   
}
