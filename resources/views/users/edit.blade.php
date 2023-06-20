<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- My Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@300;500&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/fb85f1a3b6.js" crossorigin="anonymous"></script>
  <title>WorkForLife | {{ $title }}</title>
</head>

<body>
  @extends('layout.layout')

  <!-- Content -->
  @section('content')
  <div class="global-container">
    <div class="row justify-content-md-center">
      <div class="content" id="top-content">
        <div class="flex justify-center item-center">
          <h1 class="text-2xl font-bold mb-10"><br />Edit Profil</h1>
        </div>
        <form method="post" action="/profile" enctype="multipart/form-data">
          @method('put')
          @csrf
          <!-- <div class="bg-gray-200 rounded-lg"> -->
          <div class="block w-full p-6 rounded-lg">
            <h5 class="edit text-lg">Halo, </h5>
            <p class="edit mb-4 text-lg">Silakan isi form untuk memperbarui halaman profilmu!</p>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
              <!-- <div class="w-44 font-bold h-6 mx-2 mt-3 px-4">Produk</div> -->
              <div class="flex-1 flex flex-col md:flex-row">
                <div class="w-full flex-1 mx-2">
                  <!-- <div class="my-2 p-1 bg-white flex border border-gray-200 rounded"> -->
                  <label for="nama" class="font-bold ml-1">Nama</label>
                  <input type="text" name="nama" class="bg-white rounded-xl block w-full p-2.5 border border-gray-200 @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" required value="{{ old('nama',  $profilUser->nama) }}">
                  @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <!-- <input type="text" class="p-1 px-2 w-full" name="product" id="product" value="{{ old('product_id')}}"> -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
              <!-- <div class="w-44 font-bold h-6 mx-2 mt-3">Kuantitas</div> -->
              <div class="flex-1 flex flex-col md:flex-row">
                <div class="w-full flex-1 mx-2">
                  <!-- <div class="my-2 p-1 bg-white flex border border-gray-200 rounded"> -->
                  <label for="username" class="font-bold ml-1">Username</label>
                  <input type="text" name="username" class="bg-white rounded-xl block w-full p-2.5 border border-gray-200 @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username',  $profilUser->username) }}">
                  @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <!-- <input type="text" class="p-1 px-2 w-full" name="domisili" id="domisili" value="{{ old('judul')}}"> -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
              <!-- <div class="w-44 font-bold h-6 mx-2 mt-3">Desain Sablon Produk</div> -->
              <div class="flex-1 flex flex-col md:flex-row">
                <div class="w-full flex-1 mx-2">
                  <!-- <div class="my-2 p-1 bg-white flex border border-gray-200 rounded"> -->
                  <label for="email" class="font-bold ml-1">Email</label>
                  <input type="email" name="email" class="bg-white rounded-xl block w-full p-2.5 border border-gray-200 @error('email') is-invalid @enderror" id="email" placeholder="Email address" value="{{ old('email',  $profilUser->email) }}">
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <!-- <input type="text" class="p-1 px-2 w-full" name="min_pengalaman" id="min_pengalaman" value="{{ old('judul')}}"> -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
              <!-- <div class="w-44 font-bold h-6 mx-2 mt-3">Alamat</div> -->
              <div class="flex-1 flex flex-col md:flex-row">
                <div class="w-full flex-1 mx-2">
                  <!-- <div class="my-2 p-1 bg-white flex border border-gray-200 rounded"> -->
                  <label for="no_telp" class="font-bold ml-1">Nomor Handphone</label>
                  <input type="tel" name="no_telp" class="bg-white rounded-xl block w-full p-2.5 border border-gray-200 @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Nomor Telepon" required value="{{ old('no_telp',  $profilUser->no_telp) }}">
                  @error('no_telp')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <!-- </div> -->
                  <!-- <script> //Rp dan titik untuk harga?
                            $(document).ready(function(){
                                $('#insentif').mask('#.##0', {reverse: true});
                            }) -->
                  </script>
                </div>
              </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
              <!-- <div class="w-44 text-base font-bold h-6 mx-2 mt-3">Tipe Pengiriman</div> -->
              <div class="flex-1 flex flex-col md:flex-row">
                <div class="w-full flex-1 mx-2">
                  <!-- <div class="my-2 p-1 bg-white flex border border-gray-200 rounded"> -->
                  <label for="alamat" class="font-bold ml-1">Alamat</label>
                  <input type="text" name="alamat" class="bg-white rounded-xl block w-full p-2.5 border border-gray-200 @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" value="{{ old('alamat',  $profilUser->alamat) }}">
                  @error('alamat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <!-- <input type="text" class="p-1 px-2 w-full" name="delivery_" id="kriteria" value="{{ old('judul')}}"> -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
              <!-- <div class="w-44 text-base font-bold h-6 mx-2 mt-3">Tipe Pengiriman</div> -->
              <div class="flex-1 flex flex-col md:flex-row">
                <div class="w-full flex-1 mx-2">
                  <!-- <div class="my-2 p-1 bg-white flex border border-gray-200 rounded"> -->
                  <label for="password" class="font-bold ml-1">Password</label>
                  <input type="password" name="password" class="bg-white rounded-xl block w-full p-2.5 border border-gray-200 @error('password') is-invalid @enderror" id="password" placeholder="Password baru">
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <!-- <input type="text" class="p-1 px-2 w-full" name="delivery_" id="kriteria" value="{{ old('judul')}}"> -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
              <!-- <div class="w-44 font-bold h-6 mx-2 mt-3">Desain Sablon Produk</div> -->
              <div class="flex-1 flex flex-col md:flex-row">
                <div class="w-full flex-1 mx-2">
                  <!-- <div class="my-2 p-1 bg-white flex border border-gray-200 rounded"> -->
                  <label for="foto_profil" class="font-bold ml-1">Foto Profil</label>
                  <input style="width:93.8%" class="bg-white rounded-xl block w-full p-2.5 border border-gray-200 @error('foto_profil') is-invalid @enderror mt-5" type="file" id="foto_profil" name="foto_profil" onchange="previewImage()" value="{{ old('foto_profil',  $profilUser->foto_profil) }}">
                  @error('foto_profil')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                  <!-- <input type="text" class="p-1 px-2 w-full" name="min_pengalaman" id="min_pengalaman" value="{{ old('judul')}}"> -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
          </div>
          <!-- </div> -->
          <div class="flex justify-center item-center mt-10">
            <button class="px-8 py-2 font-semibold rounded-lg bg-dongker border-2 border-[#123C69] text-white hover:bg-dongker/40 hover:border-[#123C69]/40" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->

  <script>
    function previewImage() {
      const foto_profil = document.querySelector('#foto_profil');
      const imgPreview = document.querySelector('.img-preview');
      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(foto_profil.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
</body>

</html>