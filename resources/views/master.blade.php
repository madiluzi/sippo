<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/icon-sets.css">
    <link rel="stylesheet" href="/assets/css/main.min.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="/assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="/assets/css/fonts.css" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon.png">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="brand">
            <a href="/"><img src="/assets/img/logo.png" alt="Klorofil Logo" class="img-responsive logo"></a>
        </div>
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    @if(Auth::user()->admin==0)
                        <li><a href="/" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li>
                            <a href="#subPages3" data-toggle="collapse" class="collapsed"><i
                                        class="lnr lnr-database"></i>
                                <span>Transaksi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages3" class="collapse ">
                                <ul class="nav">
                                    <li><a href="/transaksi-masuk" class="">Transaksi Masuk</a></li>
                                    <li><a href="/transaksi-keluar" class="">Transaksi Keluar</a></li>
                                </ul>
                            </div>
                        </li>
                    @else(Auth::user()->admin==1)
                        <li><a href="/" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li>
                            <a href="#subPages2" data-toggle="collapse" class="collapsed"><i
                                        class="lnr lnr-database"></i>
                                <span>Data Master</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages2" class="collapse ">
                                <ul class="nav">
                                    <li><a href="/data-produk" class="">Data Produk</a></li>
                                    <li><a href="/data-kategori-produk" class="">Data Kategori Produk</a></li>
                                    <li><a href="/data-pengguna" class="">Data Pengguna</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#subPages3" data-toggle="collapse" class="collapsed"><i
                                        class="lnr lnr-database"></i>
                                <span>Transaksi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages3" class="collapse ">
                                <ul class="nav">
                                    <li><a href="/transaksi-masuk" class="">Transaksi Masuk</a></li>
                                    <li><a href="/transaksi-keluar" class="">Transaksi Keluar</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="/laporan-penjualan" class=""><i class="lnr lnr-chart-bars"></i>
                                <span>Laporan Penjualan</span></a></li>
                        <li><a href="/peramalan" class=""><i class="lnr lnr-pie-chart"></i>
                                <span>Peramalan</span></a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-menu">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="fa fa-bars icon-nav"></i>
                    </button>
                </div>
                <div id="navbar-menu" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-left hidden-xs">
                        <div class="input-group">
                            <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                            <span class="input-group-btn"><button type="button"
                                                                  class="btn btn-primary">Go</button></span>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System
                                        space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9
                                        unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly
                                        report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly
                                        meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your
                                        request has been approved</a></li>
                                <li><a href="#" class="more">See all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/assets/img/user.png"
                                                                                            class="img-circle"
                                                                                            alt="Avatar">
                                <span>{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</span>
                                <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Keluar</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        @yield('content')
        <footer>
            <div class="container-fluid">
                <p class="text-center">&copy; 2017</p>
            </div>
        </footer>
    </div>
    <!-- END MAIN -->
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="/assets/js/jquery/jquery-2.1.0.min.js"></script>
<script src="/assets/js/bootstrap/bootstrap.min.js"></script>
<script src="/assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/assets/js/plugins/jquery-easypiechart/jquery.easypiechart.min.js"></script>
<script src="/assets/js/plugins/toastr/toastr.min.js"></script>
<script src="/assets/js/plugins/chartist/chartist.min.js"></script>
<script src="/assets/js/klorofil.min.js"></script>

</body>

</html>
