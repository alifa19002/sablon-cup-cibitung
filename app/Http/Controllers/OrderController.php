<?php

namespace App\Http\Controllers;

use App\Models\DeliveryType;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // $products = Product::orderBy('productName')->get();
        // $deliveries = DeliveryType::all();
        return view('orders.formorder', [
            'title' => 'Order',
            'active' => 'Order',
            'products' => Product::orderBy('productName')->get(),
            'deliveries' => DeliveryType::all()
        ]);
    }
    public function store(Request $request)
    {
        $uploadPath = public_path('storage/design');

        // if(!File::isDirectory($uploadPath)) {
        //     File::makeDirectory($uploadPath, 0755, true, true);
        // }
        if ($request->hasFile('design')){
            $file = $request->file('design');
            $uniqueFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $uniqueFileName);
            $imagepath = 'design/' . $uniqueFileName;
        }
        else{
            $imagepath = NULL;
        }
            $order = Order::create([
                'user_id' => request('user_id'),
                'product_id' => request('product_id'),
                'design' => $imagepath,
                'quantity' => request('quantity'),
                'address' => request('address'),
                'status' => request('status')
                // 'slug' => Str::replace(' ', '-', Str::lower(request('nama_event')))
            ]);
            $price = Product::select('price')->where('id', $order->product_id)->first();
            $price->price *= $order->quantity;

            Payment::create([
                'delivery_id' => request('delivery_id'),
                'order_id' => $order->id,
                'total_price' => $price->price
                // 'dp_proof' => request('deskripsi_event'),
                // 'payment_proof' => request('link_reg')
            ]);

            // return redirect('/order')->with('success', 'Pesanan berhasil diajukan. Lihat Status Pesanan anda di halaman profil.');
            return redirect()->route('payment', [$order->id])->with('success','Pendaftaran Berhasil');
    }
}
