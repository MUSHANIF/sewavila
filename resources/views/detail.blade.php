<?php
$tanggal = date("Y-m-d");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Musvil</title>
    {{-- <link href="/assets/css/tailwind.output.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .detail{
         
            margin-top: 10%;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Musvil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
      
       
       <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Selamat Datang,{{ Auth::user()->name }}
             </a>
             <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
               <li><a class="dropdown-item" href="/">Home</a></li>
               <li><a class="dropdown-item" href="{{ url('keranjang',Auth::user()->id) }}">keranjang</a></li>
               <li><a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
                 </form>
               </li>
             </ul>
           </li>
      </ul>
    </div>
  </div>
</nav>
 
<section id="home">
    <div class="container">
        <div class="row text-center mt-5">
            <h2>Detail Villa</h2>
        </div>
      <div class="row  pb-5">
        @foreach ($datas as $key )
            
     
        <div class="col-lg-6 p-5  mt-3">
            <form action="{{ url('/tambah',$key->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
              <input type="hidden" name="name" value="{{ $key->name}}">
              <input type="hidden" name="harga" value="{{ $key->harga}}">
              <input type="hidden" name="stok" value="{{ $key->stok}}">
                <div class="form-group">
                    <label for="formGroupExampleInput">Name</label>
                    <input class="form-control mt-3" type="text"  value="{{ $key->name }}" aria-label="Disabled input example" disabled readonly>
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Harga</label>
                    <input class="form-control mt-3" type="text"  value="{{ $key->harga }}" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput3">Stok</label>
                    <input class="form-control mt-3" type="text"  value="{{ $key->stok }}" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput3">jenis</label>
                  <input class="form-control mt-3" type="text"  value="{{ $key->jns->jenis }}" aria-label="Disabled input example" disabled readonly>
              </div>
                <div class="form-group">
                    <label for="formGroupExampleInput3">Deskripsi</label>
                    <input class="form-control mt-3" type="text" name="deskripsi" value="{{ $key->deskripsi }}" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput3">Jumlah Villa yang anda pesan</label>
                    <input type="number" class="form-control mt-3" id="formGroupExampleInput3  " name="jumlah" value="{{ old('password') }}">
                </div>
                {{-- <div class="form-group">
                    <label for="formGroupExampleInput3">Tanggal</label>
                    <input type="date" class="form-control mt-3" id="formGroupExampleInput3  " name="tanggal" value="{{ $tanggal }}">
                </div> --}}
               
               
                 <button style="background-color: #FF9106; border: unset" type="submit" class="btn btn-primary mt-4">Pesan</button>
                 <button type="reset" class="btn btn-danger mt-4">Reset</button>
            </form>
           
        
        </div>
        <div class="col-lg-6 p-5 text-center mt-5" data-aos="fade-left"  data-aos-delay="300">
            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"> <img class=" mb-2" src="/assets/images/villa/{{ $key->image }}" style="height: 300px; max-width: 450px; min-width: 100px;" /></a>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title text-center justify-content-center text-dark" id="exampleModalLabel">Detail Foto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <img class="h-32 w-35" src="/assets/images/villa/{{ $key->image }}" style="height: 100%; width: 100%" />
                     </div>
                  </div>
                  
        </div>
      </div>
      @endforeach
    </div> 
  </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>