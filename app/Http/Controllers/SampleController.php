<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;

class SampleController extends Controller
{
    public function index()
    {
        return view('samples.sample', [
            'title' => 'Sampel',
            'active' => 'sampel',
            'samples' => Sample::all()
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
