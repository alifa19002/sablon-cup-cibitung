@extends('layout.layout')

@section('content')

<div class="mx-10">
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
        </div>
        @endif
    </div>
    <div class="mb-4 border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent"
            role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2" id="order-tab"
                    data-tabs-target="#order" type="button" role="tab" aria-controls="order"
                    aria-selected="false">Order</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2" id="payment-tab"
                    data-tabs-target="#payment" type="button" role="tab" aria-controls="payment"
                    aria-selected="false">Payment</button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="product-tab" data-tabs-target="#product" type="button" role="tab" aria-controls="product"
                    aria-selected="false">Product</button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="sample-tab" data-tabs-target="#sample" type="button" role="tab" aria-controls="sample"
                    aria-selected="false">Sample</button>
            </li>
        </ul>
    </div>

    <div id="myTabContent">
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="order" role="tabpanel"
            aria-labelledby="order-tab">
            <div class="font-montserrat">
                <div class="mx-16 mt-8 mb-5">
                    <h1 class="text-3xl font-bold">Order</h1>
                </div>
                <div class="relative flex justify-center mx-8 mb-5 overflow-x-auto border shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Desain
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kuantitas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat Pengiriman
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Catatan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Pelanggan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nomor Telepon
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $order->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $order->productName }}
                                </td>
                                <td class="px-6 py-4">
                                    <!-- {{ !empty($order->user) ? $order->user->nama:'' }} -->
                                    <!-- {{ $order->is_approved!=0 ? "ada akun":'' }} -->
                                    @if($order->design != NULL)
                                    <a href="{{ asset('storage/' . $order->design) }}" target="_blank">Bukti</a>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->quantity }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->address }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->status }}
                                </td>
                                <td class="px-6 py-4">
                                    <!-- catatan -->
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->no_telp }}
                                </td>
                                <!-- <td class="px-1 py-4">
                                    {{-- @if($order->is_approved == 0) --}}
                                    <a href="/admin/order/{{ $order->id }}/detail"
                                        class="font-medium text-dongker">Detail</a>
                                    {{-- @endif --}}
                                    <form action="/admin/order/delete/{{ $order->id }}" method="post">
                                        {{-- @method('delete') --}}
                                        {{-- @csrf --}}
                                        <button class="font-medium text-dongker"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan kerja ini?')">Hapus</button>
                                    </form>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="payment" role="tabpanel"
            aria-labelledby="payment-tab">
            <div class="font-montserrat">
                <div class="mx-16 mt-8 mb-5">
                    <h1 class="text-3xl font-bold">Payment</h1>
                </div>
                <div class="relative flex justify-center mx-8 mb-5 overflow-x-auto border shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th scope="col" class="px-6 py-3">
                                Order ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Pelanggan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delivery Fee
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga Total Pesanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Bukti DP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Bukti Pelunasan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $order->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $order->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->delivery_fee }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->total_price }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($order->dp_proof != NULL)
                                    <a href="{{ asset('storage/' . $order->dp_proof ) }}" target="_blank">Bukti</a>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($order->payments_proof != NULL)
                                    <a href="{{ asset('storage/' . $order->payments_proof ) }}" target="_blank">Bukti</a>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right space-x-5">
                                    <a href="/loker/edit" class="font-medium text-dongker">Edit</a>
                                    <form action="/loker/" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="font-medium text-dongker"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan kerja ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="product" role="tabpanel"
            aria-labelledby="product-tab">
            <div class="font-montserrat">
                <div class="mx-16 mt-8 mb-5">
                    <h1 class="text-3xl font-bold">Product</h1>
                </div>
                <div class="flex justify-end mx-20 mb-2">
                    <a href="/add-product" class="text-white bg-dongker py-2 px-5 rounded-lg">Tambah</a>
                </div>
                <div class="relative flex justify-center mx-8 mb-5 overflow-x-auto border shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga per pcs
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $index => $product)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $index+1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $product->productName }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->price }}
                                </td>
                                <!-- <td class="px-5 py-4 text-right space-x-5">
                                    <a href="/posts/{{-- $post->id --}}/edit" class="font-medium text-dongker">Edit</a>
                                    <form action="/posts/{{-- $post->id --}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="font-medium text-dongker"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus post?')">Hapus</button>
                                    </form>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="sample" role="tabpanel"
            aria-labelledby="sample-tab">
            <div class="font-montserrat">
                <div class="mx-16 mt-8 mb-5">
                    <h1 class="text-3xl font-bold">Sample</h1>
                </div>
                <div class="flex justify-end mx-20 mb-2">
                    <a href="/add-sample" class="text-white bg-dongker py-2 px-5 rounded-lg">Tambah</a>
                </div>
                <div class="relative flex justify-center mx-8 mb-5 overflow-x-auto border shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Foto Sampel
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($samples as $index => $sample)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $index+1 }}
                                </th>
                                <td class="px-6 py-4">
                                    <img class="rounded-t-lg" src="{{ asset('storage/' . $sample->photo )}}" alt="">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection