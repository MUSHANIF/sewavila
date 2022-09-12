<nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
    <div class="container">
        <a class="navbar-brand scroll-page" href="#beranda">Musvil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu dekstop -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto ml-auto">
                <li class="nav-item ">
                    <a class="nav-link scroll-page" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-page" href="#produk">Koleksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-page" href="#informasi">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-page" href="#testimoni">Testimoni</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
            @can('petugas')
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Selamat Datang,{{ Auth::user()->name }}
             </a>
             <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
               <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
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
           @elsecan('user')
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Selamat Datang,{{ Auth::user()->name }}
             </a>
             <ul class="dropdown-menu "  aria-labelledby="navbarDropdownMenuLink">
               <li><a class="dropdown-item" href="pengaduan/home">Keluhan!</a></li>
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
           @elsecan('superadmin')
           
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Selamat Datang,{{ Auth::user()->name }}
             </a>
             <ul class="dropdown-menu "  aria-labelledby="navbarDropdownMenuLink">
               <li><a class="dropdown-item" href="dashboardsuperadmin">dahsboard!</a></li>
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
              @else
              <a href="{{ route('login') }}" class="btn btn-outline-dark my-3">Pesan Sekarang</a> 
              @endcan
            
        </div>
    </div>    
</nav>