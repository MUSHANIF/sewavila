<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Musvil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
   <div class="container">
        <div class="row mt-5">
         <form action="{{ url('selengkap') }}" method="GET">
          <div class="col-md-12">
            <div class="input-group mb-3">
             
                <input type="text" class="form-control" name="cari" value="{{ request('cari') }}" placeholder="Cari villa disini! atau cari jenis nya!" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2">Button</button>
           
          </div>
          </div>
           </form>
        </div>
     <div class="row"> 
      @foreach($datas as $key)
      <div class="col-md-4 mt-5">
       
                <div class="card" style="width: 18rem;">
                  <img src="/assets/images/villa/{{ $key->image }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{ $key->name }}</h5>
                    <p class="card-text">{{ $key->deskripsi }}</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Stok : {{ $key->stok }}</li>
                    <li class="list-group-item">Harga : Rp.{{ $key->harga }}/Malam</li>
                    <li class="list-group-item">Jenis : {{ $key->jenis }}</li>
                  </ul>
                  <div class="card-body">
                    <a href="#" class="card-link">Tambahkan ke keranjang</a>
                    <a href="{{ url('detail/'.$key->id) }}" class="card-link">Detail</a>
                  </div>
                </div>
     
      </div>
       @endforeach
     </div>
   </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>