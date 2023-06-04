@extends('layout.layout')

@section('content')

<div class="mx-10">
    <div class="flex justify-center item-center mt-8">
        @if(session()->has('success'))
        <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg " role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                {{ session('success') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        @endif
    </div>
    <div class="mb-4 border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2" id="order-tab" data-tabs-target="#order" type="button" role="tab" aria-controls="order" aria-selected="false">Order</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2" id="payment-tab" data-tabs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">Payment</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="product-tab" data-tabs-target="#product" type="button" role="tab" aria-controls="product" aria-selected="false">Product</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="sample-tab" data-tabs-target="#sample" type="button" role="tab" aria-controls="sample" aria-selected="false">Sample</button>
            </li>
        </ul>
    </div>

    <div id="myTabContent">
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="order" role="tabpanel" aria-labelledby="order-tab">
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
                                <!-- <th scope="col" class="px-6 py-3">
                                    Catatan
                                </th> -->
                                <th scope="col" class="px-6 py-3">
                                    Nama Pelanggan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nomor Telepon
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $order->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $order->productName }}
                                </td>
                                <td class="px-6 py-4">
                                    <!-- {{ !empty($order->user) ? $order->user->nama:'' }} -->
                                    <!-- {{ $order->is_approved!=0 ? "ada akun":'' }} -->
                                    @if($order->design != NULL)
                                    <a href="{{ asset('storage/' . $order->design) }}" target="_blank">Lihat</a>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->quantity }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->address }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($order->status !='Pesanan dibatalkan')
                                    <button id="dropdownStatusButton" data-dropdown-toggle="dropdownStatus" class="inline-flex items-center px-2 py-1 mb-3 mr-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg md:mb-0 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">{{ $order->status }} <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg></button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownStatus" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownStatusButton">
                                            <li>
                                                <form action="/change-status/{{ $order->id }}/dp" method="post">
                                                    @method('put')
                                                    @csrf
                                                    <button class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Menunggu Pembayaran DP
                                                    </button>
                                                </form>
                                                <!-- <a href="/change-status/dp" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Menunggu Pembayaran DP</a> -->
                                            </li>
                                            <li>
                                                <form action="/change-status/{{ $order->id }}/proses" method="post">
                                                    @method('put')
                                                    @csrf
                                                    <button class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Pesanan Diproses
                                                    </button>
                                                </form>
                                                <!-- <a href="/change-status/proses" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pesanan Diproses</a> -->
                                            </li>
                                            <li>
                                                <form action="/change-status/{{ $order->id }}/lunas" method="post">
                                                    @method('put')
                                                    @csrf
                                                    <button class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Menunggu Pelunasan Pembayaran
                                                    </button>
                                                </form>
                                                <!-- <a href="/change-status/lunas" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Menunggu Pelunasan Pembayaran</a> -->
                                            </li>
                                            <li>
                                                <form action="/change-status/{{ $order->id }}/kirim" method="post">
                                                    @method('put')
                                                    @csrf
                                                    <button class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Produksi Selesai
                                                    </button>
                                                </form>
                                                <!-- <a href="/change-status/kirim" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Produksi Selesai</a> -->
                                            </li>
                                            <li>
                                                <form action="/change-status/{{ $order->id }}/selesai" method="post">
                                                    @method('put')
                                                    @csrf
                                                    <button class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Pesanan Selesai
                                                    </button>
                                                </form>
                                                <!-- <a href="/change-status/selesai" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pesanan Selesai</a> -->
                                            </li>
                                        </ul>
                                    </div>
                                    @else
                                    {{ $order->status }}.</br>
                                    {{ $order->note }}
                                    @endif
                                </td>
                                <!-- <td class="px-6 py-4">
                                    catatan
                                </td> -->
                                <td class="px-6 py-4">
                                    {{ $order->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->no_telp }}
                                </td>
                                <td class="px-5 py-4 text-right space-x-5">
                                    @if($order->status !='Pesanan dibatalkan')
                                    <button data-modal-target="cancel-order" data-modal-toggle="cancel-order" class="font-medium text-dongker" type="button">
                                        Batalkan
                                    </button>
                                    <!-- Main modal -->
                                    <div id="cancel-order" data-modal-placement="center-center" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="cancel-order">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-6 py-6 lg:px-8">
                                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Batalkan Pesanan?</h3>
                                                    <form method="POST" class="space-y-6" action="/cancel-order">
                                                        @csrf
                                                        @method('put')
                                                        <div>
                                                            <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan alasan</label>
                                                            <input type="text" name="note" id="note" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                                        </div>
                                                        <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                                                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <form action="/loker/" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="font-medium text-dongker" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan kerja ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="payment" role="tabpanel" aria-labelledby="payment-tab">
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
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $order->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $order->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($order->delivery_fee == NULL && $order->delivery_id == 2)
                                    <button data-modal-target="add-delivery-fee" data-modal-toggle="add-delivery-fee" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                        Tambah
                                    </button>
                                    <!-- Main modal -->
                                    <div id="add-delivery-fee" data-modal-placement="center-center" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-delivery-fee">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-6 py-6 lg:px-8">
                                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Biaya Pengiriman</h3>
                                                    <form method="POST" class="space-y-6" action="/add-delivery-fee">
                                                        @csrf
                                                        @method('put')
                                                        <div>
                                                            <label for="delivery_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya</label>
                                                            <input type="number" name="delivery_fee" id="delivery_fee" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                                        </div>
                                                        <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                                                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    {{ $order->delivery_fee }}
                                    @endif
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
                                        <button class="font-medium text-dongker" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan kerja ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="product" role="tabpanel" aria-labelledby="product-tab">
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
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
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
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="sample" role="tabpanel" aria-labelledby="sample-tab">
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
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
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