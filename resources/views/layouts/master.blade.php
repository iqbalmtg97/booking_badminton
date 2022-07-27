<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pattiro Booking Online | @yield('tittle') </title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- Theme JS files -->
    @stack('detail')
    <!-- /theme JS files -->


    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->




</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-inverse bg-primary">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html"><img src="assets/images/pattiro.png" alt=""></a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <p class="navbar-text"><span class="label bg-success-400">Online</span></p>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/images/placeholder.jpg" alt="">
                        <span>{{ auth()->user()->nama }}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user-plus"></i> Akun Saya</a></li>
                        <li><a href="#"><i class="icon-cog5"></i> Edit Akun</a></li>
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i> Keluar</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Second navbar -->
    <div class="navbar navbar-default" id="navbar-second">
        <ul class="nav navbar-nav no-border visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i
                        class="icon-menu7"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="navbar-second-toggle">
            <ul class="nav navbar-nav">
                @if (auth()->user()->role == 'Admin')
                    <li class="active"><a href="{{ url('/dashboard') }}"><i class="icon-display4 position-left"></i>
                            Dashboard</a></li>
                    <li class="active"><a href="{{ url('/kel-penyewa') }}"><i class="icon-people position-left"></i>
                            Penyewa</a></li>
                    <li class="active"><a href="{{ url('/kel-booking') }}"><i class="icon-bookmarks position-left"></i>
                            Booking</a></li>
                    <li class="active"><a href="{{ url('/kel-lapangan') }}"><i class="icon-grid6 position-left"></i>
                            Lapangan</a></li>
                    <li class="active"><a href="#"><i class="icon-cancel-circle2 position-left"></i>
                            Pembatalan</a></li>
                @else
                    <li class="active"><a href="{{ url('/dashboard') }}"><i class="icon-display4 position-left"></i>
                            Dashboard</a></li>
                    <li class="active"><a href="{{ url('/kel-booking') }}"><i class="icon-bookmarks position-left"></i>
                            Booking</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /second navbar -->


    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main content -->
            <div class="content-wrapper">
                @yield('conten')
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
    </div>
    <!-- /page container -->


    <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2022. <a href="#">Booking Badminton</a> by <a href="http://themeforest.net/user/Kopyov"
            target="_blank">Teknik Informatika</a>
    </div>
    <!-- /footer -->

    {{-- Sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>

    {{-- Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('sukses'))
            toastr.success("{{ Session::get('sukses') }}", "Selamat")
        @endif

        @if (Session::has('gagal'))
            toastr.error("{{ Session::get('gagal') }}", "Gagal")
        @endif
    </script>
</body>
@yield('footer')

</html>
