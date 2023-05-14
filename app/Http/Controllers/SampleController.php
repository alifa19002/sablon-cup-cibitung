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
}
