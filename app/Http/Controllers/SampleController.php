<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;

class SampleController extends Controller
{
    public function index()
    {
        // return view('samples.sample', [
        //     'title' => 'Sampel',
        //     'active' => 'sampel'
        // ]);
        $title = 'Sampel';
        // if (request('category')) {
        //     $category = Sample::firstWhere('nama_kategori', request('category'));
        //     $title = ' in ' . $category->nama_kategori;
        // }
        return view('samples.sample', [
            'title' => 'Samples' . $title,
            'active' => 'samples',
            'samples' => Sample::latest()->paginate(10)->get()
            // 'events' => Sample::latest()->where('status_event', "Accepted")->filter(request(['search', 'category']))->paginate(10)->withQueryString()
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
            $order = Sample::create([
                'user_id' => request('user_id'),
                'photo' => $imagepath
            ]);
            return redirect('/admin')->with('success', 'Sampel telah ditambahkan');
    }
    public function show()
    {
        return view('admin.add-sample', [
            'title' => 'Tambah Sampel',
            'active' => 'Tambah Sampel'
        ]);
    }
}
