<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lilopel</title>
    <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="/assets/images/logo.png">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="/assets/images/logo.png">

    <!-- style -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/animate.css/animate.min.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/glyphicons/glyphicons.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/material-design-icons/material-design-icons.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css" type="text/css"/>
    <!-- build:css /assets/styles/app.min.css -->
    <link rel="stylesheet" href="/assets/styles/app.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/styles/font.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" type="text/css"/>
    <!-- endbuild -->
</head>
<body>
<div class="app" id="app">

    <!-- ############ LAYOUT START-->

    <!-- aside -->
    <div id="aside" class="app-aside modal fade nav-dropdown">
        <!-- fluid app aside -->
        <div class="left navside dark dk" layout="column">
            <div class="navbar no-radius">
                <!-- brand -->
                <a class="navbar-brand">
                    <div ui-include="'/assets/images/logo.svg'"></div>
                    <img src="/assets/images/logo.png" alt="." class="hide">
                    <span class="hidden-folded inline">Lilopel</span>
                </a>
                <!-- / brand -->
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-light">

                    <ul class="nav" ui-nav>
                        <li class="nav-header hidden-folded">
                            <small class="text-muted">Main</small>
                        </li>

                        <li>
                            <a href="/home">
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'/assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                                <span class="nav-text">Home</span>
                            </a>
                        </li>

                        <li>
                            <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                                <span class="nav-icon">
                      <i class="material-icons">&#xe5c3;
                        <span ui-include="'/assets/images/i_1.svg'"></span>
                      </i>
                    </span>
                                <span class="nav-text">Skills</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="/categories">
                                        <span class="nav-text">Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/branches">
                                        <span class="nav-text">Branches</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                                <span class="nav-icon">
                      <i class="material-icons">&#xe886;
                        <span ui-include="'/assets/images/i_1.svg'"></span>
                      </i>
                    </span>
                                <span class="nav-text">Customers</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="/customers/show">
                                        <span class="nav-text">Show Customers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/customers/add">
                                        <span class="nav-text">Add Customers</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="hidden-folded">
                            <a href="/settings">
                                <span class="nav-icon">
                                    <i class="fa fa-fw fa-wrench"></i>
                                </span>
                                <span class="nav-text">Settings</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- / -->

    <!-- content -->
    <div id="content" class="app-content box-shadow-z0" role="main">
        <div class="app-header white box-shadow">
            <div class="navbar">
                <!-- Open side - Naviation on mobile -->
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
                    <i class="material-icons">&#xe5d2;</i>
                </a>
                <!-- / -->

                <!-- Page title - Bind to $state's title -->
                <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>

                <!-- nav right -->
                @if (Auth::check())
                <ul class="nav navbar-nav pull-right">
                    @if (Auth::user()->pic)
                    <li class="nav-item dropdown">
                        <a style="background-color: transparent !important;" class="nav-link clear" href data-toggle="dropdown" aria-expanded="false">
                                <span class="avatar w-32">
                                    <img src="/storage/{{Auth::user()->pic}}">
                                </span>
                        </a>
                        <div class="dropdown-menu pull-right dropdown-menu-scale">
                            <a class="dropdown-item" href="/logout">
                                <i class="fa fa-fw fa-sign-out"></i>
                                <span>Sign out</span>
                            </a>
                        </div>
                    </li>
                    @endif
                    <li class="nav-item hidden-md-up">
                        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse"
                           aria-expanded="false">
                            <i class="material-icons"></i>
                        </a>
                    </li>
                </ul>
                <!-- / nav right -->
                @endif

                <!-- navbar collapse -->
                <div class="collapse navbar-toggleable-sm" id="collapse">
                    <div class="nav navbar-nav">
                        @if (Route::has('login'))
                            @if (Auth::check())
                                <a class="nav-link" href="{{ url('/home') }}">
                                    <i class="fa fa-fw fa-home text-muted"></i>
                                    <span>Home</span>
                                </a>
                            @else
                                <a class="nav-link pull-left pull-top" href="{{ url('/login') }}" aria-expanded="false">
                                    <i class="fa fa-fw fa-sign-in text-muted"></i>
                                    <span>Login</span>
                                </a>
                                <a class="nav-link pull-right pull-top" href="{{ url('/register') }}"
                                   aria-expanded="false">
                                    <i class="fa fa-fw  fa-plus-square-o text-muted"></i>
                                    <span>Register</span>
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
                <!-- / navbar collapse -->
            </div>
        </div>
        <div class="app-footer">
            <div class="p-a text-xs">
                <div class="pull-right text-muted">
                    &copy; Copyright <strong>Lilopel</strong> <span
                            class="hidden-xs-down">- Private project</span>
                    <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
                </div>
                <div class="nav">
                    <a class="nav-link" href="/">About</a>
                    <span class="text-muted">-</span>
                    <a class="nav-link label accent" href="https://www.lilopel.nl/">
                        Lilopel</a>
                </div>
            </div>
        </div>
        <div ui-view class="app-body" id="view">

            <!-- ############ PAGE START-->
            <div class="flex-center position-ref full-height">
                @yield('content')
            </div>


            <!-- ############ PAGE END-->

        </div>
    </div>
    <!-- / -->


    <!-- ############ LAYOUT END-->

</div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="/libs/jquery/screenfull/dist/screenfull.min.js"></script>

<!-- Bootstrap -->
<script src="/libs/jquery/tether/dist/js/tether.min.js"></script>
<script src="/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!-- core -->
<script src="/libs/jquery/underscore/underscore-min.js"></script>
<script src="/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="/libs/jquery/PACE/pace.min.js"></script>

<script src="/js/scripts/config.lazyload.js"></script>

<script src="/js/scripts/palette.js"></script>
<script src="/js/scripts/ui-load.js"></script>
<script src="/js/scripts/ui-jp.js"></script>
<script src="/js/scripts/ui-include.js"></script>
<script src="/js/scripts/ui-device.js"></script>
<script src="/js/scripts/ui-form.js"></script>
<script src="/js/scripts/ui-nav.js"></script>
<script src="/js/scripts/ui-screenfull.js"></script>
<script src="/js/scripts/ui-scroll-to.js"></script>
<script src="/js/scripts/ui-toggle-class.js"></script>


<script src="/js/scripts/app.js"></script>

<!-- ajax -->
<script src="/libs/jquery/jquery-pjax/jquery.pjax.js"></script>
<script src="/js/scripts/ajax.js"></script>
<!-- endbuild -->
@stack('scripts')
</body>
</html>
