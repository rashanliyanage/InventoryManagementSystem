<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dherana</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script> window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?> </script>

    <link href="{{ url('assets/backend/images/favicon.png') }}" rel="shortcut icon"/>
    <link href="{{ url('assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/backend/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{url('assets/backend/vendors/selectize.js-master/dist/css/selectize.default.css')}}" rel="stylesheet">


@yield('head')

<!-- Custom Theme Style -->
    <link href="{{ url('assets/backend/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/custom.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
@if (session()->has('token_error'))
    <div class="top-fixed-msg text-center error">{{ session('token_error') }} <a href="javascript:void()" onclick="location.reload();">Reload</a></div>
@endif
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" >
                    <a href="{{ url('/') }}" class="site_title text-center" style="padding: 0;">Dherana</a>
                </div>

                <div class="clearfix"></div>

                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ url('assets/backend/images/img.jpg') }}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <?php $name = explode(' ', Auth::user()->name); ?>
                        <h2 style="font-size:16px;margin: 5px 0 0;"><strong>{{ $name[0] }}</strong></h2>
                        {{--<span>{{ Auth::user()->role->role }}</span>--}}
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">

                        <ul class="nav side-menu">
                            <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Dashboard</a>
                                {{--<ul class="nav child_menu">--}}
                                    {{--<li><a href="index.html">Dashboard</a></li>--}}
                                    {{--<li><a href="index2.html">Dashboard2</a></li>--}}
                                    {{--<li><a href="index3.html">Dashboard3</a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <li><a><i class="fa fa-edit"></i> Summery <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">

                                    <li><a href="{{route('advanceSearch')}}">Advanced Search</a></li>
                                    {{--<li><a href="form_validation.html">Form Validation</a></li>--}}
                                    {{--<li><a href="form_wizards.html">Form Wizard</a></li>--}}
                                    {{--<li><a href="form_upload.html">Form Upload</a></li>--}}
                                    {{--<li><a href="form_buttons.html">Form Buttons</a></li>--}}
                                </ul>
                            </li>
                            <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('roleCreate')}}">Add Role</a></li>
                                    <li><a href="{{route('roles')}}">Manage Role</a></li>
                                    <li><a href="{{route('userCreate')}}">Add User</a></li>
                                    <li><a href="{{route('users')}}">Manage User</a></li>

                                </ul>
                            </li>
                            {{--<li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>--}}
                                {{--<ul class="nav child_menu">--}}
                                    {{--<li><a href="tables.html">Tables</a></li>--}}
                                    {{--<li><a href="tables_dynamic.html">Table Dynamic</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            <li><a><i class="fa fa-bar-chart-o"></i> Category Manage <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="morisjs.html">Add Branch</a></li>
                                    <li><a href="morisjs.html">Manage Branch</a></li>
                                    <li><a href="{{route('mainCategoryCreate')}}">Add Main Catagory</a></li>
                                    <li><a href="{{route('mainCategory')}}">Manage Main Catagry</a></li>
                                    <li><a href="{{route('subCategoryCreate')}}">Add Sub Category</a></li>
                                    <li><a href="{{route('subCategory')}}">Manage Sub Category</a></li>

                                </ul>
                            </li>

                            <li><a><i class="fa fa-clone"></i>Item Manage<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('itemsCreate')}}">Add Item</a></li>
                                    <li><a href="{{route('manageItems')}}">Manange Item</a></li>

                                </ul>
                            </li>

                            <li><a><i class="fa fa-bar-chart-o"></i> Inventory Management <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('newInventory')}}">Manage Inventory</a></li>
                                    <li><a href="{{route('inventoryLogin')}}">Manage Branch</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Live On</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-bug"></i> Manage Progect <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="e_commerce.html">Create Project</a></li>
                                    <li><a href="e_commerce.html">Manage Project</a></li>
                                    <li><a href="projects.html">Local Project</a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="page_403.html">403 Error</a></li>
                                    <li><a href="page_404.html">404 Error</a></li>
                                    <li><a href="page_500.html">500 Error</a></li>
                                    <li><a href="plain_page.html">Plain Page</a></li>
                                    <li><a href="login.html">Login Page</a></li>
                                    <li><a href="pricing_tables.html">Pricing Tables</a></li>
                                </ul>
                            </li>
                            {{--<li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>--}}
                                {{--<ul class="nav child_menu">--}}
                                    {{--<li><a href="#level1_1">Level One</a>--}}
                                    {{--<li><a>Level One<span class="fa fa-chevron-down"></span></a>--}}
                                        {{--<ul class="nav child_menu">--}}
                                            {{--<li class="sub_menu"><a href="level2.html">Level Two</a>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="#level2_1">Level Two</a>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="#level2_2">Level Two</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="#level1_2">Level One</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>--}}
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    @if (!Auth::guest())
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="{{ url('assets/backend/images/img.jpg') }}" alt="">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li> <a href="{{ url('admin/settings') }}"><i class="fa fa-gear pull-right"></i> Settings </a> </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off pull-right"></i> Logout </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                </nav>
            </div>
        </div>
    @yield('content')

    <!-- footer content -->
        <footer>
            <div class="pull-right">
                Copyright © {{ date('Y') }} {{ config('app.name', 'Laravel') }}
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<script>
    var base = '{{ url('/') }}'




</script>
<script src="{{ url('assets/backend/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ url('assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/backend/vendors/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ url('assets/backend/vendors/nprogress/nprogress.js') }}"></script>
<script src="{{ url('assets/backend/vendors/iCheck/icheck.min.js') }}"></script>
<script src="{{url('assets/backend/vendors/selectize.js-master/dist/js/standalone/selectize.min.js')}}"></script>

@yield('footer')

<!-- Custom Theme Scripts -->
<script src="{{ url('assets/backend/js/custom.min.js') }}"></script>
<script src="{{ url('js/custom.js') }}"></script>

</body>

</html>
