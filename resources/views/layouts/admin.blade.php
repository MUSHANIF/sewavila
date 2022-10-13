<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Musvil Dashboard</title>
   
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/assets/css/tailwind.output.css')}}" />
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
    <script src="https://cdn.statically.io/gh/devanka761/notipin/v1.24.49/all.js"></script>

</head>

<body>
   
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
      
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand text-center" href="/">
                        <b class="logo-icon">
            
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                       
                        <span class="logo-text">
                            {{-- <!-- dark Logo text -->
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> --}}
                            <h2>Musvil</h2>
                        </span>
                    </a>
                  
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="mdi mdi-menu"></i></a>
                </div>
               
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       @yield('search')
                    </ul>
                   
                    <ul class="navbar-nav float-end">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/users/profile.png" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                <a class="dropdown-item"  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><i class="ti-user m-r-5 m-l-5"></i>
                                    Logout</a>
                                <a class="dropdown-item" href="/"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    Kembali ke Home</a>
                               
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav mt-5">
                    <ul id="sidebarnav">
                    @can('petugas')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/produk" aria-expanded="false"><i
                                    class="mdi mdi-account-network"></i><span class="hide-menu">Produk</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/jns" aria-expanded="false"><i
                                class="mdi mdi-account-network"></i><span class="hide-menu">Jenis Villa</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/diskon" aria-expanded="false"><i
                            class="mdi mdi-account-network"></i><span class="hide-menu">Diskon</span></a>
                </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/laporan" aria-expanded="false"><i
                                class="mdi mdi-account-network"></i><span class="hide-menu">Laporan</span></a>
                    </li>
                    
                    @elsecan('superadmin')
                        
                
                        
                         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/dashboardsuperadmin" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item dropdown">
                            <a class="nav-link collapsed sidebar-link waves-effect waves-dark sidebar-link" href="#" id="navbarDropdownMenuLink" aria-haspopup="true" role="button" data-toggle="collapse" data-target="#submenu1">
                                <i class="mdi mdi-border-all"></i>
                                <span>List</span></a>
                            </a>
                          
                            <ul class="dropdown-menu collapse border-0" style="background-color: white; color: black;" id="submenu1" aria-labelledby="navbarDropdownMenuLink">
                              <li><a class="dropdown-item" href="/akunpetugas">Petugas</a></li>
                              
                        
                              <li><a class="dropdown-item" href="/akunuser">User</a></li>
                            </ul>
            
                </li>
                @else
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="/selengkap" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                        class="hide-menu">Kembali ke pencarian</span></a>
            </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="/keranjang/{{ Auth::user()->id }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                        class="hide-menu">Keranjang</span></a>
            </li>
   
                @endcan
   
             
                    </ul>

                </nav>
                
            </div>
           
        </aside>
       
        <div class="page-wrapper">
           
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                       
                       @yield('title')
                    </div>
                   @yield('button')
                </div>
            </div>
           
            <div class="container-fluid">
                @yield('isi')
            </div>
           
            <footer class="footer text-center">
                created by Musvil 1.1.0
            </footer>
            
        </div>
       
    </div>
   
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
   
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
 
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        @foreach($errors->all() as $error)
        Notipin.Alert({
            msg: "{{ $error }}", 
            yes: "OKE",
            
            type: "NORMAL",
            mode: "DARK",
            })
            
        @endforeach
        
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
       $(document).ready(function (e) {
          $("#image").change(function () {
             let reader = new FileReader();

             reader.onload = (e) => {
                $("#preview-image-before-upload").attr("src", e.target.result);
             };

             reader.readAsDataURL(this.files[0]);
          });
       });
    </script>
</body>

</html>