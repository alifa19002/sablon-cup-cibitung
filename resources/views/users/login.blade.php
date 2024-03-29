@extends('layout.layout')

@section('content')

<div class="container font-montserrat mx-auto">
  <div class="">
    <div class="">
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

      @if(session()->has('loginError'))
      <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg mx-20 max-w-[400px]" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="ml-3 text-sm font-medium text-red-700">
          {{ session('loginError') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-2" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      @endif

      <section class="md:h-screen flex flex-col md:text-left md:flex-row mt-10 lg:px-20 md:px-12 px-4">
        <div class="md:flex-1 md:mr-40">
          <h1 class="font-montserrat text-5xl font-extrabold ml-2 mb-7">Masuk</h1>
          <div>
            <form action="/login" method="post">
              <div class="flex flex-wrap">
                <div class="w-full px-4">
                  @csrf
                  <div class="pb-10">
                    <h6 class="disable">Username atau Nomor Handphone</h6>
                    <input type="text" class="rounded-xl block w-full p-2.5" name="login" class="form-control @error('login') is-invalid @enderror" id="login" placeholder="Username atau nomor handphone" value="{{ old('login') }}" autofocus required>
                    @error('login')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div>
                    <h6 class="disable">PASSWORD</h6>
                    <input type="password" name="password" class="rounded-xl block w-full p-2.5" id="password" placeholder="Password" required>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="flex justify-center items-center mt-10">
                <button class="px-8 py-2 font-semibold rounded-lg bg-pantone border-2 border-pantone text-white hover:bg-pantone/40 hover:border-pantone/40 text-justify" type="submit">Login</button>
              </div>
              <small class="block text-center mt-4">Belum punya akun? <a class="text-pingki" href="/register">Daftar Sekarang!</a> </small>
            </form>
          </div>
        </div>
        <div class="flex justify-around md:block mt-8 md:mt-0 md:flex-1">
          <img src="{{ asset('img/login.png') }}" alt="Gambar" />
        </div>
      </section>

    </div>
  </div>
</div>
</div>
@endsection