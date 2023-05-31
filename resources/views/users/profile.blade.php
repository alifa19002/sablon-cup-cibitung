<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('https://workforlife.herokuapp.com/css/app.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Profile</title>
</head>
<body>
-->
@extends('layout.layout')

@section('content')
<section class="flex item-center justify-center my-20 mx-10">

    <div class="flex-shrink-0 w-44 mb-6 h-44 sm:mb-0">
        @if($profilUser->foto_profil == NULL)
        <img src="{{ asset('img/avatar.png') }}" alt="" class="object-cover object-center w-full h-full rounded-full bg-white">
        @else
        <img src="{{ asset('storage/' . $profilUser->foto_profil) }}" alt="" class="object-cover object-center w-full h-full rounded-full bg-white">
        @endif
    </div>
    <div class="flex flex-col space-y-4 pl-5 mt-3">
        <div>
            <h4 class="text-lg mb-1">HALO,</h4>
            <h2 class="text-4xl font-medium mb-1">{{ $profilUser->username }}</h2>
        </div>
        <div>
            <button class="px-3 py-1 rounded-full bg-[#E84A5F] text-white font-bold border-[#E84A5F] hover:bg-[#E84A5F]/75 border-[#E84A5F]/75">
                <a href="/profile/{{ auth()->user()->username }}/edit">EDIT PROFIL</a>
            </button>
        </div>

</section>

<div class="flex flex-wrap font-montserrat" id="tabs-id">
    <div class="w-full">
        <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                <a class="text-sm font-bold px-5 py-3 border-b-4 border-[#123C69] block-1 leading-normal text-dongker bg-white" onclick="changeAtiveTab(event,'tab-profile')">
                    Informasi Diri
                </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                <a class="text-sm font-bold px-5 py-3 border-b-4 leading-normal text-dongker bg-white" onclick="changeAtiveTab(event,'tab-orders')">
                    Pesanan Saya
                </a>
            </li>
        </ul>
        <div class="relative flex flex-col min-w-0 break-words bg-[#F6F6F6] mb-6 mx-32 shadow-lg rounded">
            <div class="px-4 py-5 flex-auto">
                <div class="tab-content tab-space">
                    <div class="block" id="tab-profile">
                        <div class="mx-auto">
                            <form>
                                <div class="flex flex-wrap">
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block text-blueGray-600 text-sm font-bold mb-2" htmlfor="grid-password">
                                                Nama
                                            </label>
                                            <input type="text" id="disabled-input-2" class="bg-white border border-white text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $profilUser->nama }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block text-blueGray-600 text-sm font-bold mb-2" htmlfor="grid-password">
                                                Nomor Telepon
                                            </label>
                                            <input type="text" id="disabled-input-2" class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $profilUser->no_telp }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block text-blueGray-600 text-sm font-bold mb-2" htmlfor="grid-password">
                                                Email
                                            </label>
                                            <input type="text" id="disabled-input-2" class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $profilUser->email }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-6/12 px-4">
                                        <div class="relative w-full mb-3">
                                            <label class="block text-blueGray-600 text-sm font-bold mb-2" htmlfor="grid-password">
                                                Alamat
                                            </label>
                                            @if($profilUser->alamat == NULL)
                                            <input type="text" id="disabled-input-2" class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="-" disabled readonly>
                                            @else
                                            <input type="text" id="disabled-input-2" class="bg-white border border-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $profilUser->alamat }}" disabled readonly>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="hidden" id="tab-orders">
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                    <tr class="bg-[#F4F7FC]" style="background-color: #F4F7FC">
                                        <th scope="col" class="py-3 px-6">
                                            Nama Produk
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Kuantitas
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Alamat Pengiriman
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Status
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Detail Pembayaran
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($my_orders as $order)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order->productName }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $order->quantity }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $order->address }}
                                        </td>
                                        <td class="py-4 px-6">
                                            @if($order->status == "Berhasil")
                                            <p class="p-2 rounded-md text-white text-xs uppercase" style="background-color: #2F9960">{{ $order->status }}</p>
                                            @elseif($order->status == "Menunggu Pembayaran DP" or $order->status == "Menunggu Pelunasan")
                                            <p class="p-2 rounded-md text-white text-xs uppercase" style="background-color: #D6AD2B">{{ $order->status }}
                                                <button class="block w-800 md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" >
                                                    <a href="{{ route('payment', ['id' => $order->id]) }}">
                                                        Upload Bukti Pembayaran
                                                    </a>
                                                </button>
                                            </p>
                                            @elseif($order->status == "Pesanan dipending")
                                            <p class="p-2 rounded-md text-white text-xs uppercase" style="background-color: #6680C2">{{ $order->status }}
                                                <button class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" >
                                                    <a href="{{-- route('formPayment', ['id' => $order->id]) --}}">
                                                        Lihat Catatan
                                                    </a>
                                                </button>
                                            </p>
                                            @else
                                            <p class="p-2 rounded-md text-white text-xs uppercase" style="background-color: #6D6D6D">{{ $order->status }}</p>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6">
                                            <button data-modal-target="detail-modal{{$order->id}}" data-modal-toggle="detail-modal{{$order->id}}" class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                                Lihat
                                            </button>
                                            <div id="detail-modal{{$order->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                                Small modal
                                                            </h3>
                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="detail-modal{{$order->id}}">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-6 space-y-6">
                                                        <div class="relative overflow-x-auto">
                                                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <tbody>
                                                                        <tr class="bg-white dark:bg-gray-800">
                                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                                                                                Harga Total
                                                                            </th>
                                                                            <td class="px-6 py-4 text-right">
                                                                                {{ $order->total_price }}  
                                                                            </td>
                                                                        </tr>
                                                                        @if($order->delivery_fee != NULL)
                                                                        <tr class="bg-white dark:bg-gray-800">
                                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                                                                                Biaya Pengiriman
                                                                            </th>
                                                                            <td class="px-6 py-4 text-right">
                                                                                {{ $order->delivery_fee }}
                                                                            </td>
                                                                        </tr>
                                                                        @endif
                                                                        <tr class="bg-white dark:bg-gray-800">
                                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                                                                                Bukti Pembayaran DP
                                                                            </th>
                                                                            <td class="px-6 py-4 text-right">
                                                                                @if($order->dp_proof != NULL)
                                                                                    <a href="{{ asset('storage/' . $order->dp_proof ) }}" target="_blank">Lihat Bukti</a>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="bg-white dark:bg-gray-800">
                                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                                                                                Bukti Pelunasan
                                                                            </th>
                                                                            <td class="px-6 py-4 text-right">
                                                                                @if($order->payment_proof != NULL)
                                                                                    <a href="{{ asset('storage/' . $order->payment_proof ) }}" target="_blank">Lihat Bukti</a>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                            <button data-modal-toggle="detail-modal{{$order->id}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                                            <button data-modal-toggle="detail-modal{{$order->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    </div>
</div>
</div>

<script type="text/javascript">
    function changeAtiveTab(event, tabID) {
        let element = event.target;
        while (element.nodeName !== "A") {
            element = element.parentNode;
        }
        ulElement = element.parentNode.parentNode;
        aElements = ulElement.querySelectorAll("li > a");
        tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
        for (let i = 0; i < aElements.length; i++) {
            aElements[i].classList.remove("border-[#123C69]");
            aElements[i].classList.add("text-dongker");
            tabContents[i].classList.add("hidden");
            tabContents[i].classList.remove("block");
        }
        element.classList.add("text-dongker");
        element.classList.add("border-[#123C69]");
        document.getElementById(tabID).classList.remove("hidden");
        document.getElementById(tabID).classList.add("block");
    }
</script>

@endsection