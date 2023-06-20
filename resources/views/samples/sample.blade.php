@extends('layout.layout')

@section('content')

<section class="text-center pb-24">
    <h1 class="font-montserrat font-extrabold text-3xl">Contoh Sampel</h1>
</section>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
      @foreach($samples as $sample)
      <div class="container mx-auto px-4 aspect-square">
          <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $sample->photo )}}" title="{{$sample->productName}}" alt="sampel">
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