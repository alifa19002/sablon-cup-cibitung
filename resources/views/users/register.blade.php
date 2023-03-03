@extends('layout.layout')
@section('content')

<section class="flex justify-center items-center font-montserrat">
    <div class="block p-6 w-[700px]">
      <div>
        <h1 class="text-3xl text-center font-bold mb-10"><b>Buat Akun</b></h1>
      </div>
      <form method="POST" action="/register" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-8">
          <div class="form-group mb-3">
            <label for="nama" class="ml-1">Nama</label>
            <input required value="{{ old('nama') }}" type="text" class="@error('nama') is-invalid @enderror form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-xl transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="nama" name="nama" placeholder="Nama">
            @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="username" class="ml-1">Username</label>
            <input required value="{{ old('username') }}" type="text" class="@error('username') is-invalid @enderror form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-xl transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="username" name="username" placeholder="Username">
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="email" class="ml-1">Email</label>
            <input required value="{{ old('email') }}" type="email" class="@error('email') is-invalid @enderror form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-xl transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="email" name="email" placeholder="Email">
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="no_telp" class="ml-1">Nomor Telepon</label>
            <input required value="{{ old('no_telp') }}" type="text" class="@error('no_telp') is-invalid @enderror form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-xl transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="no_telp" name="no_telp" placeholder="Nomor Telepon">
            @error('no_telp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="password" class="ml-1">Password</label>
            <input required value="{{ old('password') }}" type="password" class="@error('password') is-invalid @enderror form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-xl transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="password" name="password" placeholder="Password">
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="password" class="ml-1">Konfirmasi Password</label>
            <input required value="{{ old('password') }}" type="password" class="@error('password') is-invalid @enderror form-control block w-full px-3 py-1.5 text-base font-normaltext-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-xl transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="password" name="password" placeholder="Konfirmasi Password">
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="">Jenis Kelamin</label>
            <div class="flex">
            <div class="flex items-center mr-4 mb-1">
              <input id="jk" type="radio" name="jk" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required value="L" {{ old('jk') == 'L' ? 'checked' : '' }}>
              <label for="jk" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">L</label>
            </div>
            <div class="flex items-center mr-4">
              <input id="jk" type="radio" name="jk" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required value="P" {{ old('jk') == 'P' ? 'checked' : '' }}>
              <label for="jk" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">P</label>
            </div>
            <input id="role" type="hidden" name="role" required value="0">
            </div>
          </div>
        </div>
        <div class="flex justify-center items-center">
          <button class="px-8 py-2 font-semibold rounded-lg bg-dongker border-2 border-[#123C69] text-white hover:bg-dongker/40 hover:border-[#123C69]/40 text-justify" type="submit">Daftar Sekarang</button>
        </div>
      </form>
    </div>
    </section>
@endsection
    