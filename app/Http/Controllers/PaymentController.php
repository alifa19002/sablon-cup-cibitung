<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($id)
    {
        // $products = Product::orderBy('productName')->get();
        // $deliveries = DeliveryType::all();
        $payment = Order::select('orders.id', 'orders.design', 'orders.quantity', 'orders.address', 'payments.delivery_id', 'products.productName', 'products.price', 'payments.delivery_fee', 'payments.total_price', 'payments.dp_proof', 'delivery_types.type', Payment::raw('IFNULL(payments.delivery_fee + payments.total_price, payments.total_price) as total'))
            ->join('products', 'products.id', '=', 'orders.product_id')->join('payments', 'payments.order_id', '=', 'orders.id')->join('delivery_types', 'delivery_types.id', '=', 'payments.delivery_id')
            ->where('orders.id', $id)->first();

        return view('orders.payment-form', [
            'title' => 'Payment',
            'active' => 'Payment',
            'payment' => $payment
        ]);
    }
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $payment = Payment::where('order_id', $id)->first();
        if($payment->dp_proof == NULL){
            $uploadPath = public_path('storage/dp_proof');
            if ($request->hasFile('dp_proof')) {
                $file = $request->file('dp_proof');
                $uniqueFileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $uniqueFileName);
                $proof = 'dp_proof/' . $uniqueFileName;
            } else {
                $proof = NULL;
            }
            $order->status = 'Pesanan diproses';
            $payment->dp_proof = $proof;
        }
        else{
            $uploadPath = public_path('storage/payment_proof');
            if ($request->hasFile('payment_proof')) {
                $file = $request->file('payment_proof');
                $uniqueFileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $uniqueFileName);
                $proof = 'payment_proof/' . $uniqueFileName;
            } else {
                $proof = NULL;
            }
            if($payment->delivery_id == 1){
                $order->status = "Pesanan Dapat Diambil";
            }
            else{
                $order->status = "Pesanan dikirim";
            }
            $payment->payment_proof = $proof;
        }
        
        if ($payment->save() && $order->save()) {
            return redirect('/profile')->with('success', 'Pembayaran sukses!');
        } else {
            return redirect('/profile')->with('error', 'Pembayaran gagal!');
        }
    }

    public function deliveryFee(Request $request, $id)
    {
        $payment = Payment::where('order_id', request('order_id'))->first();
        $payment->delivery_fee = request('delivery_fee');
        if ($payment->save()) {
            return redirect('/admin')->with('success', 'Pembayaran sukses!');
        } else {
            return redirect('/admin')->with('error', 'Pembayaran gagal!');
        }
    }
}
