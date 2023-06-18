@extends('layout.layout')

@section('content')

<section class="text-center pb-24">
    <h1 class="font-montserrat font-extrabold text-3xl">Contoh Sampel</h1>
    <div class="pt-8">
        <span>
          <!-- <form action="/sampel">
            <input type="text" id="search" class="h-12 w-1/2 p-3 rounded-lg shadow-md border-2" name="search" value="{{ request('search') }}">
            <span class="pl-3 space-x-3">
              <button type="submit" class="w-20 h-12 text-center rounded-lg bg-dongker text-white text-base hover:bg-dongker/50">
                Cari
              </button>
            </span>
          </form> -->
        </span>

    </div>
</section>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
      @foreach($samples as $sample)
      <div class="container mx-auto px-4 aspect-square mb-4">
          <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $sample->photo )}}" alt="">
      </div>
      @endforeach
</div>


<!-- <div class="mx-10 grid grid-cols-3 gap-8 mb-10">
    @foreach ($samples as $sample)
    <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">        
      <div class="p-6">
        <img class="rounded-lg" src="{{ asset('storage/' . $sample->photo )}}" alt="">
      </div>
    </div>
    @endforeach
</div> -->

@endsection