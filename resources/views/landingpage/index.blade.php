<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="shortcut icon" href="frontend/images/shuttlecock1.png">
    <title>Pattiro Booking Online</title>
    <!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href={{ asset('frontend/css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('frontend/css/font-awesome.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('frontend/css/templatemo-art-factory.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('frontend/css/owl-carousel.css') }}>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">PATTIRO BADMINTON</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#welcome" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Jadwal Lapangan</a></li>
                            <li class="scroll-to-section"><a href="#services">Cara Booking</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Kontak</a></li>
                            <li class="scroll-to-section"><a href="{{ url('/login') }}">Login</a></li>
                            <li class="scroll-to-section"><a href="{{ url('/register') }}">Register</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>Booking Online<strong></strong></h1> <br>
                        <h3 class="text-white">Jam Operasional | 07.00-16.00 WIB</h3> <br> <br>
                        <a href="{{ url('/login') }}" class="main-button-slider">Booking Sekarang</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="frontend/images/badminton1.png" class="rounded img-fluid d-block mx-auto"
                            alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="right-text col-lg-12 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h5 class="text-center text-primary">INFORMASI JADWAL LAPANGAN</h5>
                    </div>
                    <div class="center-text">
                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center text-primary">Nama Pemboking</th>
                                    <th class="text-center text-primary">Lapangan</th>
                                    <th class="text-center text-primary">Tanggal</th>
                                    <th class="text-center text-primary">Jam</th>
                                    <th class="text-center text-primary">Durasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->user->nama }}</td>
                                        <td class="text-center">{{ $item->lapangan->nama_lapangan }}</td>
                                        <td class="text-center">{{ $item->tanggal }}</td>
                                        <td class="text-center">{{ $item->jam }}</td>
                                        <td class="text-center">{{ $item->durasi }} Jam</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->





    <!-- ***** Features Small Start ***** -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="frontend/images/number-one.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Langkah Satu</h5>
                        <p>Lihat jadwal lapangan untuk mengetahui jadwal lapangan yang kosong.</p> <a href="#about">Cek
                            Jadwal</a>
                        {{-- <a href="#" class="main-button">Read More</a> --}}
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="frontend/images/service-icon-02.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Langkah Dua</h5>
                        <p>Log-in ke dalam aplikasi, jika belum memiliki akun
                            silahkan Registrasi terlebih dahulu. </p> <a href="{{ url('/login') }}">Log-in</a>
                        {{-- <a href="#" class="main-button">Discover More</a> --}}
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="frontend/images/service-icon-03.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Langkah Tiga</h5>
                        <p>Klik Booking dan isi data booking, lengkapi semua data sesuai form.</p> <br>
                        {{-- <a href="#" class="main-button">More Detail</a> --}}
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="frontend/images/service-icon-02.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Langkah Empat</h5>
                        <p>Lakukan pembayaran Down Paymen (DP), kemudian upload bukti pembayaran DP.</p> <br>
                        {{-- <a href="#" class="main-button">Read More</a> --}}
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="frontend/images/service-icon-01.png" alt=""></i>
                        </div>
                        <h5 class="service-title">SELESAI</h5>
                        <p> Admin akan memperoses
                            bookingan anda. Silahkan cek secara berkala status Booking..</p> <br>
                        {{-- <a href="#" class="main-button">Discover</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->


    <!-- ***** Frequently Question Start ***** -->
    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about2">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-8 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="left-heading">
                        <h5>Pembayaran</h5>
                    </div>
                    <p>Untuk saat ini pembayaran dapat dilakukan melalui Mobile Banking & ShopeePay.
                    </p>
                    <ul>
                        <li>
                            <img src="frontend/images/about-icon-01.png" alt="">
                            <div class="text">
                                <h6>Pembayaran Mobile Banking</h6>
                                <p>Anda dapat mentransfer ke Nomor Rekering 12109789 Atas Nama Admin Patiro Badminton.
                                </p>
                            </div>
                        </li>
                        <li>
                            <img src="frontend/images/about-icon-02.png" alt="">
                            <div class="text">
                                <h6>Pembayaran ShopePay</h6>
                                <p>Anda dapat melakukan pembayaran dengan melakukan scan pada barcode disamping.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-4 col-md-12 col-sm-12 mobile-bottom-fix-big"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="frontend/images/frame.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->
    <!-- ***** Frequently Question End ***** -->


    <!-- ***** Contact Us Start ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <!-- ***** Contact Map Start ***** -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.816320001959!2d109.36147641422781!3d-0.0573737355349107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59ef2b1bca33%3A0xc5bedfabc161b705!2sGor%20Pattiro!5e0!3m2!1sid!2sid!4v1659709743246!5m2!1sid!2sid"
                            width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <!-- ***** Contact Map End ***** -->

                <!-- ***** Contact Form Start ***** -->

                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->


    <!-- ***** Footer Start ***** -->
    {{-- <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2020 Art Factory Company

                        . Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> --}}
    <!-- Footer -->
    <footer class="text-center text-lg-start text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4 text-primary">
                            <i class="icon icon-gem me-3"></i>Patiro Boking Online
                        </h6>
                        <p>
                            Merupakan aplikasi yang digunakan untuk melakukan booking lapangan badminton secara online.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4 text-primary">
                            Menu
                        </h6>
                        <p>
                            <a href="#about2" class="text-reset">Metode Pembayaran</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Harga</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Berita</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4 text-primary">Kontak</h6>
                        <p> Pontianak, Kalimantan, Indonesia</p>
                        <p>patirobadminton@gmail.com</p>
                        <p>+(62)8 989-900-00</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2022

        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- jQuery -->
    <script src={{ asset('frontend/js/jquery-2.1.0.min.js') }}></script>

    <!-- Bootstrap -->
    <script src={{ asset('frontend/js/popper.js') }}></script>
    <script src={{ asset('frontend/js/bootstrap.min.js') }}></script>

    <!-- Plugins -->
    <script src={{ asset('frontend/js/owl-carousel.js') }}></script>
    <script src={{ asset('frontend/js/scrollreveal.min.js') }}></script>
    <script src={{ asset('frontend/js/waypoints.min.js') }}></script>
    <script src={{ asset('frontend/js/jquery.counterup.min.js') }}></script>
    <script src={{ asset('frontend/js/imgfix.min.js') }}></script>

    <!-- Global Init -->
    <script src={{ asset('frontend/js/custom.js') }}></script>

    <script src="/js/app.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script> --}}

    {{-- https://code.jquery.com/jquery-3.5.1.js
    https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js
    https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js
    https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js --}}

</body>

</html>
