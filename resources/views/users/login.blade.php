@extends('layout.layout')

@section('content')

<div class="container font-montserrat mx-auto" >
  <div class="">
    <div class="">
      <!--
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      -->

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
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
      </div>
      @endif

      <!--
      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      -->

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
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
      </div>
      @endif

    <section class="md:h-screen flex flex-col md:text-left md:flex-row mt-10 lg:px-20 md:px-12 px-4">
    <div class="md:flex-1 md:mr-40">
      <h1 class="font-montserrat text-5xl font-extrabold ml-2 mb-7">Masuk</h1>
      <div>
      <form action="/login" method="post">
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            @csrf
            <div class="pb-10">
              <h6 class="disable">EMAIL</h6>
              <input type="email" class="w-96 rounded-xl" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email address" value="{{ old('email') }}" autofocus required>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="">
              <h6 class="disable">PASSWORD</h6>
              <input type="password" name="password" class="form-control w-96 rounded-xl" id="password" placeholder="Password" required>
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

            {{-- 
            <div class="">
              <h6 class="disable">EMAIL</h6>
              <input type="email" class="form-control w-96" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email address" value="{{ old('email') }}" autofocus required>
            </div>
            <div class="">
              <h6 class="disable">PASSWORD</h6>
              <input type="password" class="form-control w-96" id="Password" placeholder="Password">
            </div> 
              --}}
            </div>
              <div class="mx-36 mt-8 mb-1">
                <button class="px-8 py-2 font-semibold rounded-lg bg-dongker border-2 border-[#123C69] text-white hover:bg-dongker/40 hover:border-[#123C69]/40 text-justify" type="submit">Login</button>
              </div>
              <small class="d-block text-center mx-20">Belum punya akun? <a class="text-pingki" href="/register">Daftar Sekarang!</a> </small>
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
    