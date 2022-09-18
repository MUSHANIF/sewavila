<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="vendor/aos/dist/aos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Musvil</title>
</head>
<body>
@include('partials.navbar')
    <header id="beranda">
        <div class="container">
            <div class="d-flex align-items-center flex-column">
                <h2 class="text-center">Anda mencari Villa? Tapi tidak tau dimana? <br><span>Musvil</span>  Solusinya! </h2>
                <div>
                    <a href="#produk" class="btn btn-outline-dark scroll-page">Lihat Produk</a>
                </div> 
                <div class="illustration">
                    <img class="d-none d-lg-block" src="img/background/hmm.png" alt="wayang">
                    <img class="d-lg-none" src="img/background/hmm.png" alt="wayang-2">
                </div>
            </div>
        </div>
    </header>
    <section class="produk" id="produk">
        <div class="container">
            <div data-aos="fade-up" class="title-produk text-center aos-init">
                <h3>Villa Paling Dicari</h3>
                <p>Kami memberikan pilihan <br> villa yang paling diminati</p>
            </div>
            <div class="row produk-list">
                @foreach ($datas as $data )
                    
               
                <div data-aos="fade-up" class="col-12 col-md-6 col-lg-3 aos-init">
                    <a href="">
                        <div class="card">
                            <div class="image">
                                <img src="/assets/images/villa/{{ $data->image }}" alt="Gatot Kaca">
                            </div>
                            <div class="info">
                                <h3>{{ $data->name }}</h3>
                                <p>IDR {{ $data->harga }}/malam</p>
                            </div>
                            <div class="hover d-flex justify-content-center align-items-center">
                                <div class="find">
                                    <img src="img/icon/find.png" alt="search">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
             
            </div>
            <div data-aos="fade-up" class="text-center aos-init">
                <a href="/selengkap" class="btn btn-outline-dark">Selengkapnya</a>
            </div>
        </div>
    </section>
    <section class="informasi" id="informasi">
        <div class="container">
            <div class="row">
                <div data-aos="fade-right" class="col-12 col-lg-7 aos-init">
                    <div class="info-about">
                        <h3 class="text-center text-lg-left">Kenapa kamu harus menyewa villa <br>  di Musvil ?</h3>
                        <p class="text-center text-lg-left">Musvil merupakan sebuah tempat dimana kamu bisa mencari tempat penyewaan villa di jawa barat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat </p>
                        <div class="d-flex flex-wrap">
                            <div class="info-icon d-flex align-items-center">
                                <img src="img/icon/ic_bahan.png" alt="bahan">
                                <div class="info-text d-flex flex-column">
                                    <span>Rating Website</span>
                                    <label>*****</label>
                                </div>
                            </div>
                            <div class="info-icon d-flex align-items-center">
                                <img src="img/icon/ic_tahanair.png" alt="bahan">
                                <div class="info-text d-flex flex-column">
                                    <span>Kenyamanan</span>
                                    <label>Sangat nyaman</label>
                                </div>
                            </div>
                            <div class="info-icon d-flex align-items-center">
                                <img src="img/icon/ic_bahan.png" alt="bahan">
                                <div class="info-text d-flex flex-column">
                                    <span>Tempat</span>
                                    <label>Indah dan Asri</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div data-aos="fade-left" class="gambar d-none d-lg-block aos-init">
                        <img class="ilustrasi-2" src="img/ilustrasi/ilustrasi-2.png" alt="">
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" class="row flex-column-reverse flex-lg-row mt-5 aos-init">
                <div class="col-lg-6">
                    <div class="row mt-5">
                        <div class="col-12 col-sm-4">
                            <div class="img-about-2">
                                <img src="img/ilustrasi/owi.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="img-about-2">
                                <img src="img/ilustrasi/owi.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="img-about-2">
                                <img src="img/ilustrasi/owi.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-about">
                        <h3 class="text-center text-lg-right">Telah di kunjungi oleh berbagai <br> Tokoh Setempat!</h3>
                        <p class="text-center text-lg-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promo" id="promo">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="promo-text">
                        <h3 class="text-center">Paket Spesial <br> Barata Yudha dan Ramayana</h3>
                        <p class="text-center">Paket ini berisi seluruh Macam kebutuhan yang lengkap di dalam nya!</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row produk-list">
                        <div data-aos="flip-left" class="col-12 col-md-6 col-lg-6 aos-init">
                            <a href="">
                                <div class="card">
                                    <div class="image">
                                        <img src="img/produk/villa1.jpg" alt="Wayang Kulit Baratayudha">
                                    </div>
                                    <div class="info">
                                        <h3>Barata Yudha</h3>
                                        <p>IDR 1,890,000</p>
                                    </div>
                                    <div class="hover d-flex justify-content-center align-items-center">
                                        <div class="find">
                                            <img src="img/icon/find.png" alt="search">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div data-aos="flip-left" class="col-12 col-md-6 col-lg-6 aos-init">
                            <a href="">
                                <div class="card">
                                    <div class="image">
                                        <img src="img/produk/villa2.jpg" alt="Wayang Kulit Ramayana">
                                    </div>
                                    <div class="info">
                                        <h3>Ramayana</h3>
                                        <p>IDR 1,550,000</p>
                                    </div>
                                    <div class="hover d-flex justify-content-center align-items-center">
                                        <div class="find">
                                            <img src="img/icon/find.png" alt="search">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimoni" id="testimoni">
        <div class="container">
            <h3 class="text-center">Bagaimana pendapat mereka yang <br> menyewa ditempat kami ?</h3>
            <div class="list-testimoni d-flex flex-column align-items-center flex-sm-row justify-content-sm-center align-items-sm-start">
                <div data-aos="zoom-in" class="card aos-init" style="width: 360px;">
                    <div class="card-body">
                        <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                    </div>
                    <div class="customer d-flex align-items-center">
                        <div class="img-cstmr">
                            <img src="img/users/user-1.jpg" alt="">
                        </div>
                        <a class="name-cstmr" href="#">Yoga Permana</a>
                    </div>
                </div>
                <div data-aos="zoom-in" class="card aos-init" style="width: 360px;">
                    <div class="card-body">
                        <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                    </div>
                    <div class="customer d-flex align-items-center">
                        <div class="img-cstmr">
                            <img src="img/users/user-2.jpg" alt="">
                        </div>
                        <a class="name-cstmr" href="#">Swadika Prasetya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner" id="banner">
        <div class="container">
            <div class="banner-card d-flex flex-column justify-content-center flex-sm-row justify-content-sm-between align-items-sm-center">
                <h3>Ingin memesan atau ada sesuatu yang <br> ingin ditanyakan ? </h3>
                <div>
                    <a class="btn btn-orange" href="https://api.whatsapp.com/send?phone=+6281236540123">Klik Disini</a>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="info-footer">
                        <a href=""><h2>Musvil</h2></a>
                        <address>Jalan Teuku Umar Barat No. 100, Denpasar Barat <br> Bali, Indonesia</address>
                        <p>contact@Musvil.co.id <br>
                            +62821-3412-3654</p>
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column flex-lg-row justify-content-sm-between">
                    <div class="menu-footer d-flex">
                        <ul>
                            <li><a href="">Koleksi</a></li>
                            <li><a href="">Informasi</a></li>
                            <li><a href="">Testimoni</a></li>
                            <li><a href="">Kontak</a></li>
                        </ul>
                        <ul>
                            <li><a href="">Cara Memesan</a></li>
                            <li><a href="">Galeri</a></li>
                            
                        </ul>
                    </div>
                    <div class="social-media">
                        <a class="mr-4" href=""><img src="img/icon/ic_fb.png" alt=""></a>
                        <a class="mr-4" href=""><img src="img/icon/ic_ig.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/aos/dist/aos.js"></script>
    <script>
        AOS.init({
            easing: 'ease-out-back',
            duration: 1000
        });
        $(document).ready(function(){
            $('.scroll-page').click(function(e){
                var tujuan = $(this).attr('href');
                var elemenTujuan = $(tujuan);

                $('html , body').animate({
                    scrollTop : elemenTujuan.offset().top - 70
                }, 1250 , 'swing');
                e.preventDefault();
            });
        });
    </script>
</body>
</html>