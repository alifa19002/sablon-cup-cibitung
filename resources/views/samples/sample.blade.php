@extends('layout.layout')
@section('content')
<section class="text-center pb-24">
    <h1 class="font-montserrat font-extrabold text-3xl">Contoh Sampel</h1>
</section>
<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
      @foreach($samples as $sample)
      <div class="container mx-auto px-4 aspect-square">
          <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $sample->photo )}}" title="{{$sample->productName}}" alt="sampel">
          <h6 class="font-montserrat font-semibold text-center text-green-700">{{$sample->productName}}</h6>
      </div>
      @endforeach
</div>
@endsection