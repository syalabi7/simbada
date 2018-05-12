<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title')</title>
    <!-- Favicon-->
<!--    <link rel="icon" href="template/favicon.ico" type="image/x-icon">-->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
<!--    <link href="template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">-->
    {{Html::style('template/plugins/bootstrap/css/bootstrap.css')}}

    <!-- Waves Effect Css -->
<!--    <link href="template/plugins/node-waves/waves.css" rel="stylesheet" />-->
    {{Html::style('template/plugins/node-waves/waves.css')}}

    <!-- Animation Css -->
<!--    <link href="template/plugins/animate-css/animate.css" rel="stylesheet" />-->
    {{Html::style('template/plugins/node-waves/waves.css')}}

    <!-- JQuery DataTable Css -->
<!--    <link href="template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">-->
    {{Html::style('template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}

    <!-- Custom Css -->
<!--    <link href="template/css/style.css" rel="stylesheet">-->
    {{Html::style('template/css/style.css')}}

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<!--    <link href="template/css/themes/all-themes.css" rel="stylesheet" />-->
    {{Html::style('template/css/themes/all-themes.css')}}
</head>

<body class="theme-red">
<!-- Page Loader-->
<!--<div class="page-loader-wrapper">-->
<!--    <div class="loader">-->
<!--        <div class="preloader">-->
<!--            <div class="spinner-layer pl-red">-->
<!--                <div class="circle-clipper left">-->
<!--                    <div class="circle"></div>-->
<!--                </div>-->
<!--                <div class="circle-clipper right">-->
<!--                    <div class="circle"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <p>Please wait...</p>-->
<!--    </div>-->
<!--</div>-->
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ url('/') }}">Admin SIMBADA</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
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
                @if (Request::path() == 'dashboard')
                <li class="active">
                    @else
                <li class="">
                    @endif

                    <a href="{{ url('/dashboard') }}">
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
<!--                    <a href="template/pages/examples/404.html">-->
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
                &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
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
<!--<script src="template/plugins/jquery/jquery.min.js"></script>-->
{{Html::script('template/plugins/jquery/jquery.min.js')}}


<!-- Bootstrap Core Js -->
<!--<script src="template/plugins/bootstrap/js/bootstrap.js"></script>-->
{{Html::script('template/plugins/bootstrap/js/bootstrap.js')}}

<!-- Select Plugin Js -->
<!--<script src="template/plugins/bootstrap-select/js/bootstrap-select.js"></script>-->
{{Html::script('template/plugins/bootstrap-select/js/bootstrap-select.js')}}

<!-- Slimscroll Plugin Js -->
<!--<script src="template/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>-->
{{Html::script('template/plugins/jquery-slimscroll/jquery.slimscroll.js')}}

<!-- Waves Effect Plugin Js -->
<!--<script src="template/plugins/node-waves/waves.js"></script>-->
{{Html::script('template/plugins/node-waves/waves.js')}}

<!-- Jquery DataTable Plugin Js -->
<!--<script src="template/plugins/jquery-datatable/jquery.dataTables.js"></script>-->
{{Html::script('template/plugins/jquery-datatable/jquery.dataTables.js')}}
<!--<script src="template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>-->
{{Html::script('template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}
<!--<script src="template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>-->
{{Html::script('template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}
<!--<script src="template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>-->
{{Html::script('template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}
<!--<script src="template/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>-->
{{Html::script('template/plugins/jquery-datatable/extensions/export/jszip.min.js')}}
<!--<script src="template/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>-->
{{Html::script('template/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}
<!--<script src="template/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>-->
{{Html::script('template/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}
<!--<script src="template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>-->
{{Html::script('template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}
<!--<script src="template/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>-->
{{Html::script('template/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}

<!-- Morris Plugin Js -->
<!--<script src="template/plugins/raphael/raphael.min.js"></script>-->
{{Html::script('template/plugins/raphael/raphael.min.js')}}
<!--<script src="template/plugins/morrisjs/morris.js"></script>-->
{{Html::script('template/plugins/morrisjs/morris.js')}}

<!-- Custom Js -->
<!--<script src="template/js/admin.js"></script>-->
{{Html::script('template/js/admin.js')}}
<!--<script src="template/js/pages/tables/jquery-datatable.js"></script>-->
{{Html::script('template/js/pages/tables/jquery-datatable.js')}}
<!--<script src="template/js/pages/charts/morris.js"></script>-->
{{Html::script('template/js/pages/charts/morris.js')}}

<!-- Demo Js -->
<!--<script src="template/js/demo.js"></script>-->
{{Html::script('template/js/demo.js')}}

<script>
    $('#editLocation').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var locid = button.data('locid') // Extract info from data-* attributes
        var locname = button.data('locname') // Extract info from data-* attributes
        var location_id = button.data('location_id') // Extract info from data-* attributes

        var modal = $(this);
        modal.find('.modal-body #id_lokasi').val(locid);
        modal.find('.modal-body #nama_lokasi').val(locname);
        modal.find('.modal-body #location_id').val(location_id);
    })

    $('#editCategory').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var catname = button.data('catname') // Extract info from data-* attributes
        var category_id = button.data('category_id') // Extract info from data-* attributes

        var modal = $(this);
        modal.find('.modal-body #nama_kategori').val(catname);
        modal.find('.modal-body #category_id').val(category_id);
    })
</script>
</body>

</html>