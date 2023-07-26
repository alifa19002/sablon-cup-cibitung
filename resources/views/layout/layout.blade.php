<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sablon Cup Cibitung</title>
  <link rel="icon" href="{{ asset('img/logo1.ico') }}">
  <link href="{{ asset('css/testimonial.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Secular One' rel='stylesheet'>
  <script src="https://unpkg.com/flowbite@1.4.2/dist/flowbite.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <!-- Navbar -->
  <nav class="p-4 bg-coolGray-100 text-coolGray-800">
    <div class="container flex justify-between h-16 mx-auto">
      <div class="flex">
        <a rel="noopener noreferrer" href="{{ url('/') }}" aria-label="Back to homepage" class="flex items-center pb-32 pt-2 px-35 w-48 h-48 ">
          <img src="{{ asset('img/logo.png') }}" alt="logo">
        </a>
        <ul class="items-stretch hidden space-x-3 lg:flex">
          <li class="flex">
            <a rel="noopener noreferrer" href="{{ url('/') }}" class="flex text-pantone font-secularone items-center px-4 -mb-1 border-b-2 border-transparent">
              <svg style="color: rgb(42, 166, 75);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" fill="#2aa64b"></path>
              </svg>
              Beranda</a>
          </li>
          <li class="flex">
            <a rel="noopener noreferrer" href="/sample" class="flex text-pantone font-secularone items-center px-4 -mb-1 border-b-2 border-transparent">
              <svg style="color: rgb(42, 166, 75);" version="1.1" id="art-gallery" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"> <path d="M10.71,4L7.85,1.15C7.6555,0.9539,7.339,0.9526,7.1429,1.1471C7.1419,1.1481,7.141,1.149,7.14,1.15L4.29,4H1.5 C1.2239,4,1,4.2239,1,4.5v9C1,13.7761,1.2239,14,1.5,14h12c0.2761,0,0.5-0.2239,0.5-0.5v-9C14,4.2239,13.7761,4,13.5,4H10.71z M7.5,2.21L9.29,4H5.71L7.5,2.21z M13,13H2V5h11V13z M5,8C4.4477,8,4,7.5523,4,7s0.4477-1,1-1s1,0.4477,1,1S5.5523,8,5,8z M12,12 H4.5L6,9l1.25,2.5L9.5,7L12,12z" fill="#2aa64b"></path> </svg>
              Lihat Sampel</a>
          </li>
          <li class="flex">
            <a rel="noopener noreferrer" href="/order" class="flex text-pantone font-secularone items-center px-4 -mb-1 border-b-2 border-transparent">
              <svg style="color: rgb(42, 166, 75);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" fill="#2aa64b"></path>
              </svg>
              Order</a>
          </li>
          @auth
          @if(Auth::user()->role == 1)
          <li class="flex">
            <a rel="noopener noreferrer" href="/admin" class="flex text-pantone font-secularone items-center px-4 -mb-1 border-b-2 border-transparent">Dashboard</a>
          </li>
          @endif
          @endauth
        </ul>
      </div>

      @guest
      <div class="pt-2 items-center flex-shrink-0 hidden lg:flex">
        <form action="/login">
          @csrf
          <button class="px-8 py-2 font-semibold rounded-lg bg-pantone border-2 border-pantone text-white hover:bg-pantone/40 hover:border-pantone/40">Masuk</button>
        </form>
      </div>
      @endguest

      @auth
      <div class="pt-2 items-center flex-shrink-0 hidden lg:flex">
        <form action="/logout" method="POST">
          @csrf
          <button class="px-8 py-2 font-semibold rounded-lg bg-pantone border-2 border-panatone text-white hover:bg-pantone/40 hover:border-panatone/40">Keluar</button>
        </form>

        <button type="button" class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
          <div class="w-10 h-10 mx-10 overflow-hidden border-2 border-gray-400 rounded-full">
            <a href="/profile">
              @if(Auth::user()->foto_profil != NULL)
              <img src="{{ asset('storage/' . auth()->user()->foto_profil) }}" class="object-cover w-full h-full" alt="avatar">
              @else
              <img src="{{ asset('img/avatar.png') }}" class="object-cover w-full h-full" alt="avatar">
              @endif
            </a>
          </div>
        </button>
      </div>
      @endauth

      <!--Mobile Menu-->
      <div class="md:hidden flex items-center">
        @guest
        <div class="pt-2 items-center flex-shrink-0 flex">
          
          <form action="/login">
            @csrf
            <button class="px-3 py-1 font-semibold rounded-lg bg-pantone border-2 border-panatone text-white hover:bg-pantone/40 hover:border-panatone/40">Masuk</button>
          </form>
        </div>
        @endguest

        @auth
        <div class="pt-2 items-center flex-shrink-0 flex">
          <button type="button" class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
            <div class="w-9 h-9 mx-9 overflow-hidden border-2 border-gray-400 rounded-full">
              <a href="/profile">
                @if(Auth::user()->foto_profil != NULL)
                <img src="{{ asset('storage/' . auth()->user()->foto_profil) }}" class="object-cover w-full h-full" alt="avatar">
                @else
                <img src="{{ asset('img/avatar.png') }}" class="object-cover w-full h-full" alt="avatar">
                @endif
              </a>
            </div>
          </button>
        </div>
        @endauth
        <button class="outline-none mobile-menu-button">
          <svg class=" w-6 h-6 text-gray-500 hover:text-pantone " x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

    </div>
    </div>
    <!-- mobile menu -->
    <div class="hidden mobile-menu mx-10">
      <ul class="">
        <li><a href="/" class="block text-sm px-2 py-4 bg-white hover:bg-pantone hover:text-white transition duration-300">Beranda</a></li>
        <li><a href="/sample" class="block text-sm px-2 py-4 bg-white hover:bg-pantone hover:text-white transition duration-300">Lihat Sample</a></li>
        <li><a href="/order" class="block text-sm px-2 py-4 bg-white hover:bg-pantone hover:text-white transition duration-300">Order</a></li>
        @auth
        @if(Auth::user()->role == 1)
        <li><a href="/admin" class="block text-sm px-2 py-4 bg-white hover:bg-pantone hover:text-white transition duration-300">Dashboard</a></li>
        @endif
        <li>
          <form action="/logout" method="POST">
            @csrf
            <button class="block text-sm px-2 py-4 bg-white hover:bg-pantone hover:text-white transition duration-300">Keluar</button>
          </form>
        </li>
        @endauth
      </ul>
    </div>
    </div>

    <script>
      const btn = document.querySelector("button.mobile-menu-button");
      const menu = document.querySelector(".mobile-menu");

      btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
      });
    </script>
  </nav>


  <!-- START MAIN -->
  <div class="py-4">
    @yield('content')
  </div>
  <!-- END MAIN -->

  <!-- Footer -->
  <footer class="bg-pantone">
    <div class="mx-auto w-full max-w-screen-xl px-4 py-4 font-montserrat">
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div>
          <img class="w-200" src="{{ asset('img/logo-dark.png') }}" alt="logo dark">

          <p class="max-w-md mt-4 text-md text-white">
          UMKM yang bergerak di bidang produksi dan penjualan dari gelas cup plastik yang memproduksi gelas cup yang disablon dengan desain tertentu untuk meningkatkan nilai jual. Sablon Cup Cibitung berlokasi di Kecamatan Cibitung, Kabupaten Bekasi, Jawa Barat.
          </p>

          <div class="flex mt-4 space-x-6 text-white mb-4">
            <a class="hover:opacity-75" href="https://www.facebook.com/asyifagroups/" target="_blank" rel="noreferrer">
              <span class="sr-only"> Facebook </span>

              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
              </svg>
            </a>

            <a class="hover:opacity-75" href="https://www.instagram.com/sabloncupcibitung/" target="_blank" rel="noreferrer">
              <span class="sr-only"> Instagram </span>

              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
              </svg>
            </a>

            <a class="hover:opacity-75" href="https://twitter.com/joy_soempheno" target="_blank" rel="noreferrer">
              <span class="sr-only"> Twitter </span>

              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
              </svg>
            </a>

            <a class="hover:opacity-75" href="http://wa.me/+6281281976004" target="_blank" rel="noreferrer">
              <span class="sr-only"> Whatsapp </span>

              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
              </svg>
            </a>
          </div>
        </div>

        <!-- <div class="pl-40 pt-9 grid grid-cols-1 gap-[300px] lg:col-span-2 sm:grid-cols-2 lg:grid-cols-4">

          <div class="w-40">
            <p class="font-bold text-lg text-white">
              Telusuri
            </p>

            <nav class="flex flex-col mt-4 space-y-4 text-sm text-white">
              <a class="hover:opacity-75" href=""> Home </a>
              <a class="hover:opacity-75" href=""> Lowongan Kerja </a>
              <a class="hover:opacity-75" href=""> Berbagi Pengalaman </a>
              <a class="hover:opacity-75" href=""> Rekrut Sekarang </a>
            </nav>
          </div>

          <div class="w-32">
            <p class="font-bold text-lg text-white">
              Informasi
            </p>

            <nav class="flex flex-col mt-4 space-y-4 text-sm text-white">
              <a class="hover:opacity-75" href=""> Tentang Kami </a>
              <a class="hover:opacity-75" href=""> Kontak </a>
            </nav>
          </div>

        </div> -->
      </div>

      <!-- <p class="mt-8 text-xs text-white">
        &copy; 2023 Sablon Cup Cibitung
      </p> -->
      <hr class="my-6 border-white sm:mx-auto lg:my-8" />
      <span class="block text-xs text-white sm:text-center">© 2023 Sablon Cup Cibitung. All Rights Reserved.</span>
    </div>
  </footer>
  <script>
    feather.replace()
  </script>
</body>

</html>