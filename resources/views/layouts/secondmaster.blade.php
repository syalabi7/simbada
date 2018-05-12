<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../template/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../template/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../template/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../template/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../template/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="/">Admin Page</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:void(0);"><i class="material-icons">input</i> </a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <!--                <img src="template/images/user.png" width="48" height="48" alt="User" />-->
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 24px;">
                    {{ Auth::user()->username }}
                </div>
                <div class="email" style="font-size: 14px;">
                    {{ Auth::user()->email }}
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                @if (Request::path() == '/')
                <li class="active">
                    @else
                <li class="">
                    @endif

                    <a href="{{ url('/') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if (Request::path() == 'locations')
                <li class="active">
                    @else
                <li class="">
                    @endif

                    <a href="{{ route('locations.index') }}">
                        <i class="material-icons">location_on</i>
                        <span>Lokasi / Ruang</span>
                    </a>
                </li>
                @if (Request::is('asets'))
                <li class="active">
                    @else
                <li class="">
                    @endif
                    <a href="{{ route('asets.index') }}">
                        <i class="material-icons">storage</i>
                        <span>Daftar Aset</span>
                    </a>
                </li>
                @if (Request::path() == 'categories')
                <li class="active">
                    @else
                <li class="">
                    @endif
                    <a href="{{ route('categories.index') }}">
                        <i class="material-icons">assessment</i>
                        <span>Kategori</span>
                    </a>
                </li>
                @if (Request::path() == 'perkondisi')
                <li class="active">
                    @else
                <li class="">
                    @endif
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">local_offer</i>
                        <span>Report</span>
                    </a>
                    <ul class="ml-menu">
                        @if (Request::path() == 'perkondisi')
                        <li class="active">
                            @else
                        <li class="">
                            @endif
                            <a href="{{ url('perkondisi') }}">
                                <span>Statistic Kondisi Per Lokasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span>Per Kategori</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span>Per Tahun Nominal</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2018 - 2018 <a href="javascript:void(0);">AdminSimbada - SMPN 1 SBY</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        @yield('content')
    </div>
</section>

<!-- Jquery Core Js -->
<script src="../template/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../template/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../template/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../template/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../template/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="../template/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="../template/plugins/raphael/raphael.min.js"></script>
<script src="../template/plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="../template/plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="../template/plugins/flot-charts/jquery.flot.js"></script>
<script src="../template/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="../template/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="../template/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="../template/plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="../template/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="../template/js/admin.js"></script>
<script src="../template/js/pages/index.js"></script>

<!-- Demo Js -->
<script src="../template/js/demo.js"></script>

@yield('add_js')
</body>

</html>