<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
   -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Dashboard - {{ auth()->user()->name }}</title>
    <!-- Bootstrap Core CSS -->
    {{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- This is Sidebar menu CSS -->
    <link href="{{ asset('css/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('css/jquery.toast.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <!-- This is a Animation CSS -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (default.css) for this starter
         page. However, you can choose any other skin from folder css / colors .
         -->
    <link href="{{ asset('css/blue-dark.css') }}" id="theme" rel="stylesheet">
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <livewire:styles/>
    <wireui:scripts/>
</head>

<body class="fix-sidebar">
<!-- Preloader -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="wrapper">
    <!-- Top Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <!-- Toggle icon for mobile view -->
            <div class="top-left-part">
                <!-- Logo -->

                <a class="logo" href="index.html">
                    <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon-->
                        <img src="{{ asset('images/admin-logo.png') }}" alt="home" class="dark-logo"/>
                    </b>
                    <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text-->
                            {{ auth()->user()->shop->name }}
                     </span> </a>
            </div>
            <!-- /Logo -->
            <!-- Hide Menu of phone interface -->
            <ul class="nav navbar-top-links navbar-left">
                <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i
                            class="ti-close ti-menu"></i></a></li>

            </ul>
            <!-- This is the message dropdown -->
            <ul class="nav navbar-top-links navbar-right pull-right">
                <!-- /.Task dropdown -->
                <!-- /.dropdown -->

                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img
                            src="{{ asset('images/default-profil.jpg') }}" alt="user-img" width="36" class="img-circle"><b
                            class="hidden-xs">{{ auth()->user()->name }}</b><span class="caret"></span> </a>
                    <form class="dropdown-menu dropdown-user animated flipInY">
                <li>
                    <div class="dw-user-box">
                        <div class="u-img"><img src="{{ asset('images/default-profil.jpg') }}" alt="user"/>
                        </div>
                        <div class="u-text"><h4>{{ auth()->user()->name }}</h4>
                            <p class="text-muted">{{ auth()->user()->email }}</p>
                            {{--                                    <a href="profile.html"--}}
                            {{--                                       class="btn btn-rounded btn-danger btn-sm">View--}}
                            {{--                                        Profile</a>--}}
                        </div>
                    </div>
                </li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                <li style="display:none;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="waves-effect" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span>
                        </a>
                    </form>
                </li>
            </ul>
            <!-- /.dropdown-user -->
            </li>

            <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
    </nav>
    <!-- End Top Navigation -->
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span>
                    <span class="hide-menu">Navigation</span></h3></div>
            <ul class="nav" id="side-menu">
                <li><a href="javascript:void(0)" class="waves-effect active"><i data-icon="v"
                                                                                class="linea-icon linea-basic fa-fw"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
                        <span class="hide-menu">Manage Shop<span class="fa arrow"></span>
                            </span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ route('products.show') }}"><i data-icon=")"
                                                                      class="linea-icon linea-basic fa-fw"></i><span
                                    class="hide-menu">Products</span></a></li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="fa-fw">S</i><span class="hide-menu"> Categories</span></a>
                        </li>
                        <li>
                            <a href="{{ route('orders.show') }}">
                                <i class="icon-basket"></i><span class="hide-menu"> Orders</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" class="waves-effect">
                        <i class="linea-icon linea-basic fa-fw icon-people"></i><span
                            class="hide-menu">Manage User<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="javascript:void(0)"><i class="linea-icon linea-basic fa-fw icon-user"></i><span
                                    class="hide-menu">Client</span></a></li>
                    </ul>
                </li>
                <li class="m-l-15">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="waves-effect" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span>
                        </a>
                    </form>
                </li>

            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
@yield('content')
<!-- /#page-wrapper -->

    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2022 &copy; My Dashboard</footer>
</div>
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Sidebar menu plugin JavaScript -->
<script src="{{ asset('js/sidebar-nav.min.js') }}"></script>
<!--Slimscroll JavaScript For custom scroll-->
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('js/waves.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
        $(document).ready(function () {
            var table = $('#example').DataTable({
                "columnDefs": [
                    {
                        "visible": false
                        , "targets": 2
                    }
                ]
                , "order": [[2, 'asc']]
                , "displayLength": 25
                , "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip'
        , buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
<!-- jQuery file upload -->
<script src="{{ asset('js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function () {
        // Basic
        $('.dropify').dropify();

        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
{{-- Toast js--}}
<script src="{{ asset('js/jquery.toast.js') }}"></script>
<script src="{{ asset('js/toastr.js') }}"></script>
<script>

    window.addEventListener('closeModalProduct', event => {
        $(".modal").modal('hide');

        setTimeout(function () {
            location.reload();
        }, 1000)
    });

    // $(function () {
    //     if (performance.navigation.type) {
    //         $("#alerttopright").fadeToggle(350);
    //     }
    // })

    //Alerts
    $(".myadmin-alert .closed").click(function (event) {
        $(this).parents(".myadmin-alert").fadeToggle(350);
        return false;
    });
    /* Click to close */
    $(".myadmin-alert-click").click(function (event) {
        $(this).fadeToggle(350);
        return false;
    });

</script>

@wireUiScripts
<script src="//unpkg.com/alpinejs" defer></script>
<livewire:scripts/>
</body>

</html>
