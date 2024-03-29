<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Sample;

class SampleController extends Controller
{
    public function index()
    {
        return view('samples.sample', [
            'title' => 'Sampel',
            'active' => 'sampel',
            'samples' => Sample::join('products', 'products.id', '=', 'samples.product_id')->get()
        ]);
    }
    public function store(Request $request)
    {
        $uploadPath = public_path('storage/photo');

        if ($request->hasFile('photo')){
            $file = $request->file('photo');
            $uniqueFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $uniqueFileName);
            $imagepath = 'photo/' . $uniqueFileName;
        }
        else{
            $imagepath = NULL;
        }
            Sample::create([
                'product_id' => request('product_id'),
                'photo' => $imagepath
            ]);
            return redirect('/admin')->with('success', 'Sampel telah ditambahkan');
    }
    public function show()
    {
        return view('admin.add-sample', [
            'title' => 'Tambah Sampel',
            'active' => 'Tambah Sampel',
            'products' => Product::orderBy('productName')->get()
        ]);
    }
    public function destroy($id)
    {
        $sample = Sample::destroy($id);
        if ($sample) {
            return redirect('/admin')->with('success', 'Sampel telah dihapus!');
        } else {
            return redirect('/admin')->with('error', 'Sampel gagal dihapus!');
        }
    }
}
