@extends('layout.layout')

@section('content')
<div>
    <div class="mx-20 mt-5 mb-10">
        <h1 class="text-2xl font-bold font-montserrat">Konfirmasi Pembayaran</h1>
    </div>

    <div class="flex justify-center overflow-x-auto relative mb-10">
        <div class="w-1/3 rounded-xl border border-gray-200 shadow-md">
            <div class="p-6">
                <div class="pt-3">
                    <table class="border-separate font-montserrat w-full text-md text-left">
                        <tr>
                            <th>
                                <p class="text-left">Nama Pengguna</p>
                            </th>
                            <th>
                                <p class="text-right">{{ auth()->user()->nama }}</p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p class="text-left">No. Telepon</p>
                            </th>
                            <th>
                                <p class="text-right">{{ auth()->user()->no_telp }}</p>    
                            </th>
                        </tr>
                        <tr class="mt-5">
                            <th>
                                <p class="text-left">Rincian Pemesanan</p>
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="px-3 py-3">
                    <table class="font-montserrat w-full text-md text-left">
                        <tr>
                            <th>
                                <p class="text-left font-normal">Nama Produk</p>
                            </th>
                            <th>
                                <p class="text-right font-normal">{{ $payment->productName }}</p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p class="text-left font-normal">Kuantitas</p>
                            </th>
                            <th>
                                <p class="text-right font-normal">{{ $payment->quantity }}</p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p class="font-normal">Harga satuan</p>
                            </th>
                            <th>
                                <p class="text-right font-normal">Rp {{ $payment->quantity }}</p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p class="font-normal">Total Harga</p>
                            </th>
                            <th>
                                <p class="text-right font-normal">Rp {{ $payment->total_price }}</p>
                            </th>
                        </tr>
                        @if($payment->delivery_id == 1)
                        <tr>
                            <th>
                                <p class="font-normal">Delivery Fee</p>
                            </th>
                            <th>
                                @if($payment->delivery_fee != NULL)
                                <p class="text-right font-normal">Rp {{ $payment->delivery_fee }}</p>
                                @else
                                <p class="text-right font-normal"> info </p>
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p class="font-normal">Total Harga</p>
                            </th>
                            <th>
                                <p class="text-right font-normal">Rp {{ $payment->total_price + $payment->delivery_fee }}</p>
                            </th>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
            <div class="pl-5 pb-6 font-montserrat text-md">
                <p class="font-bold pb-3">Silakan melakukan pembayaran melalui beberapa metode di bawah:</p>
                <p class="pb-1">Gopay: 0812917291901 a.n. Work For Life Indonesia</p>
                <p>BCA: 8670718618 a.n. Work For Life Indonesia</p>
            </div>
        </div>
    </div>

    @if($payment->dp_proof == NULL)
    <form action="/payment/{{$payment->id}}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
        <div class="flex justify-center">
            <label class="block mb-2 font-montserrat text-md font-medium" for="dp_proof">Upload Bukti Pembayaran DP</label>
        </div>

        <div class="flex justify-center overflow-x-auto relative">
            <input class="block w-1/3 text-sm bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none " id="dp_proof" name="dp_proof" type="file">
        </div>

        <div class="mt-5 mb-5">
            <div class="flex justify-center">
                <button class="px-8 py-2 font-semibold rounded-lg bg-dongker border-2 border-[#123C69] text-white hover:bg-dongker/40 hover:border-[#123C69]/40" type="submit">Submit</button>
            </div>
        </div>
    </form>
    @else
    <form action="/payment/{{$payment->id}}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
        <div class="flex justify-center">
            <label class="block mb-2 font-montserrat text-md font-medium" for="payment_proof">Upload Bukti Pelunasan Pembayaran</label>
        </div>

        <div class="flex justify-center overflow-x-auto relative">
            <input class="block w-1/3 text-sm bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none " id="payment_proof" name="payment_proof" type="file">
        </div>

        <div class="mt-5 mb-5">
            <div class="flex justify-center">
                <button class="px-8 py-2 font-semibold rounded-lg bg-dongker border-2 border-[#123C69] text-white hover:bg-dongker/40 hover:border-[#123C69]/40" type="submit">Submit</button>
            </div>
        </div>
    </form>
    @endif
</div>
@endsection