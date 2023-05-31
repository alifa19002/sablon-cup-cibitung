@extends('layout.layout')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<div class="font-montserrat my-10">
    <div class="flex justify-center item-center mt-8">
        @if(session()->has('success'))
        <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg " role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div><br/>
        @endif
        <h1 class="text-2xl font-bold"><br/>Form Buat Pesanan</h1>
    </div>
    <div class="flex justify-center item-center">
        <form method="POST" action="/order/create" enctype="multipart/form-data" class="w-6/12">
        @csrf
        <div class="bg-abu rounded-lg">
        <div class="m-10 py-10">
            <div class="flex flex-col md:flex-row pb-4 mb-4">
                <div class="w-44 font-bold h-6 mx-2 mt-3">Product</div>
                <div class="flex-1 flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                        <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="">== Pilih Produk ==</option>
                                @foreach ($products as $id => $product)
                                    <option value="{{ $product->id }}">{{ $product->productName }}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" class="p-1 px-2 w-full" name="product" id="product" value="{{ old('product_id')}}"> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
                <div class="w-44 font-bold h-6 mx-2 mt-3">Kuantitas</div>
                <div class="flex-1 flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                        <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                            <input type="number" id="quantity" name="quantity" min="1000" max="20000" step="1000" value="0">
                            <!-- <input type="text" class="p-1 px-2 w-full" name="domisili" id="domisili" value="{{ old('judul')}}"> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
                <div class="w-44 font-bold h-6 mx-2 mt-3">Desain Sablon Produk</div>
                <div class="flex-1 flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                        <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                            <input type="file" id="design" name="design">
                            <!-- <input type="text" class="p-1 px-2 w-full" name="min_pengalaman" id="min_pengalaman" value="{{ old('judul')}}"> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
                <div class="w-44 font-bold h-6 mx-2 mt-3">Alamat</div>
                <div class="flex-1 flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                        <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                            <input type="text" class="p-1 px-2 w-full" name="address" id="address" value="{{ old('address',  auth()->user()->alamat) }}">
                        </div>
                        <!-- <script> //Rp dan titik untuk harga?
                            $(document).ready(function(){
                                $('#insentif').mask('#.##0', {reverse: true});
                            }) -->
                        </script>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
                <div class="w-44 text-base font-bold h-6 mx-2 mt-3">Tipe Pengiriman</div>
                <div class="flex-1 flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                        <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                            <select name="delivery_id" id="delivery_id" class="form-control">
                                <option value="">== Pilih Tipe Pengiriman ==</option>
                                @foreach ($deliveries as $id => $delivery)
                                    <option value="{{ $delivery->id }}">{{ $delivery->type }}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" class="p-1 px-2 w-full" name="delivery_" id="kriteria" value="{{ old('judul')}}"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @auth
            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
        @endauth
            <input type="hidden" name="status" id="status" value="Menunggu Pembayaran DP">
        <div class="flex justify-center item-center pb-4">
            <button class="px-8 py-2 font-semibold rounded-lg bg-dongker border-2 border-[#123C69] text-white hover:bg-dongker/40 hover:border-[#123C69]/40" type="submit">Submit</button>
        </div>
        </form>
    </div>
</div>
@endsection