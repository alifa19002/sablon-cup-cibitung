@extends('layout.layout')

<!--  Hero -->
@section('content')
<section class="relative pt-10 md:mt-0 md:h-screen flex flex-col justify-center text-center md:text-left md:flex-row md:justify-between md:items-center lg:px-20 md:px-12 px-4">
  <div class="md:flex-1 md:mr-40">
    <h1 class="font-montserrat text-5xl font-extrabold mb-7">Pesan <span class="text-pingki">Gelas Cup</span> Untuk Usahamu Disini</h1>
    <p class="font-montserrat font-light mb-7 max-w-xl">
      Dapatkan gelas cup plastik dengan desain atau logo produk minuman Anda!
    </p>
    <div>
      <form class="font-montserrat flex">
        <a href="/order" class="px-8 rounded-lg bg-pantone text-white font-bold p-4 border-pantone hover:bg-pantone/75 border-pantone/75">Order Sekarang
        </a>
      </form>
    </div>
  </div>
  <div class="flex justify-around md:block mt-8 md:mt-0 md:flex-1">
    <img src="{{ asset('img/depan.png') }}" alt="Gambar" />
  </div>
</section>

<!-- Loker Terbaru -->
{{-- @if($latest_loker != NULL) --}}
<!-- <section class="relative bg-[#123C69]">
    <div class="pt-28 max-h-7">
        <p class="font-montserrat font-bold pt-5 text-white text-center text-5xl sm:text-4xl">Beberapa Lowongan Terbaru</p>
    </div>
  <div class="flex items-center justify-center h-screen">
    {{-- @foreach($latest_loker as $loker) --}}
    <div class="font-montserrat bg-white font-semibold text-center rounded-xl border shadow-lg px-10 py-5 max-w-xs md:m-10">
      <img class="mb-3 w-32 h-32 rounded-lg mx-auto" src="{{ asset('img/gojek.png') }}" alt="logo">
      <h2 class="text-md pb-3"> {{-- $loker->posisi --}}</h1>
      {{-- @if($loker->insentif != NULL) --}}
      <h3 class="text-lg pb-5 font-bold"> {{-- $loker->insentif --}} </h3>
      {{-- @else --}}
      <h3 class="text-lg pb-5 font-bold"></h3>
      {{-- @endif --}}
      <a href="/loker/{{-- $loker->id --}}" class="my-8 bg-[#123C69] px-8 py-2 rounded-xl text-gray-100 font-semibold uppercase tracking-wide hover:bg-[#123C69]/70">Lihat Detail</a>
    </div>
    {{-- @endforeach --}}
  </div>
  </section>-->
<!-- delete "{{-- --}}" to uncomment -->
{{-- @endif  --}}

@endsection