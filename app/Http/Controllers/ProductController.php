<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.add-product', [
            'title' => 'Tambah Produk',
            'active' => 'Tambah Produk'
        ]);
    }
    
    public function store(Request $request)
    {
        Product::create([
            'productName' => request('productName'),
            'price' => request('price')
        ]);
        return redirect('/admin')->with('success', 'Produk telah ditambahkan');
    }
}
