
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Личный кабинет - @yield('title')</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="/css/profile/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/css/profile/materialadmin.css" />
    <link type="text/css" rel="stylesheet" href="/css/profile/material-design-iconic-font.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="/css/custom.css" rel="stylesheet">


    @yield('css')
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/js/profile/html5shiv.js"></script>
    <script type="text/javascript" src="/js/profile/respond.min.js"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed menubar-pin ">

<!-- BEGIN HEADER-->
<header id="header" >
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="{{ url('/profile') }}">
                            <span class="text-lg text-bold text-primary">Личный кабинет</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">

            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<span class="profile-info" style="margin-top: 10px;">
									{{ Auth::user()->profile->name }} {{Auth::user()->profile->last_name}}
									<small></small>
								</span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-fw fa-power-off text-danger"></i> Выйти</a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->
        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
   @yield('content')

           <!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN MENUBAR-->
    <div id="menubar" class="menubar-inverse ">
        <div class="menubar-fixed-panel">
            <div>
                <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <div class="menubar-scroll-panel">

            <!-- BEGIN MAIN MENU -->
            <ul id="main-menu" class="gui-controls">

                <!-- BEGIN DASHBOARD -->
                <li>
                    <a href="{{ url("/profile") }}" >
                        <div class="gui-icon"><i class="fa fa-home"></i></div>
                        <span class="title">Домой</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END DASHBOARD -->

                <!-- BEGIN EMAIL -->
                <li>
                    <a href="{{ route('money.create') }}" >
                        <div class="gui-icon"><i class="fa fa-btc"></i></div>
                        <span class="title">Сделать вклад</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END EMAIL -->

                <!-- BEGIN EMAIL -->
                <li>
                    <a href="{{ url("/history") }}" >
                        <div class="gui-icon"><i class="fa fa-bank"></i></div>
                        <span class="title">Вклады</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END EMAIL -->

                <!-- BEGIN DASHBOARD -->
                <li>
                    <a href="{{ url("/conclusion") }}" >
                        <div class="gui-icon"><i class="fa fa-money"></i></div>
                        <span class="title">Выводы</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END DASHBOARD -->

                <li>
                    <a href="{{ url("/offers") }}" >
                        <div class="gui-icon"><i class="fa fa-area-chart"></i></div>
                        <span class="title">Предложения</span>
                    </a>
                </li><!--end /menu-li -->

                <li>
                    <a href="{{ url("/calc") }}" >
                        <div class="gui-icon"><i class="fa fa-calculator"></i></div>
                        <span class="title">Калькулятор</span>
                    </a>
                </li><!--end /menu-li -->

                <li>
                    <a href="/profile/{{$data->user->id}}/edit" >
                        <div class="gui-icon"><i class="fa fa-refresh"></i></div>
                        <span class="title">Редактировать профиль</span>
                    </a>
                </li><!--end /menu-li -->

            </ul><!--end .main-menu -->
            <!-- END MAIN MENU -->

            <div class="menubar-foot-panel">
                <small class="no-linebreak hidden-folded">
                    <span class="opacity-75">Elcoin Bank &copy; 2016</span> <strong></strong>
                </small>
            </div>
        </div><!--end .menubar-scroll-panel-->
    </div><!--end #menubar-->
    <!-- END MENUBAR -->

    <!-- BEGIN OFFCANVAS RIGHT -->
    <div class="offcanvas">




    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS RIGHT -->

</div><!--end #base-->
<!-- END BASE -->

<!-- BEGIN JAVASCRIPT -->
<script src="/js/profile/libs/jquery-1.11.2.min.js"></script>
<script src="/js/profile/libs/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/profile/libs/bootstrap.min.js"></script>
<script src="/js/profile/libs/spin.min.js"></script>
<script src="/js/profile/libs/jquery.autosize.min.js"></script>
<script src="/js/profile/libs/jquery.nanoscroller.min.js"></script>
<script src="/js/profile/core/App.js"></script>
<script src="/js/profile/core/AppNavigation.js"></script>
<script src="/js/profile/core/AppOffcanvas.js"></script>
<script src="/js/profile/core/AppCard.js"></script>
<script src="/js/profile/core/AppForm.js"></script>
<script src="/js/profile/core/AppNavSearch.js"></script>
<script src="/js/profile/core/AppVendor.js"></script>
<!-- END JAVASCRIPT -->
@yield('js')

</body>
</html>