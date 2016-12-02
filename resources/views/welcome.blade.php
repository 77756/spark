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
    <link rel="stylesheet" href="/libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.css" type="text/css"/>
    <!-- build:css /assets/styles/app.min.css -->
    <link rel="stylesheet" href="/assets/styles/app.css" type="text/css"/>
    <!-- endbuild -->
    <link rel="stylesheet" href="/assets/styles/font.css" type="text/css"/>
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
                    <span class="nav-text">Search</span>
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

                        <li class="nav-header hidden-folded">
                            <small class="text-muted">Help</small>
                        </li>

                        <li class="hidden-folded">
                            <a href="docs.html">
                                <span class="nav-text">Documents</span>
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

                <!-- navbar collapse -->
                <div class="collapse navbar-toggleable-sm" id="collapse">
                    @if (Route::has('login'))
                        <div class="top-right left">
                            @if (Auth::check())
                                <a class="nav-link" href="{{ url('/home') }}">
                                    <i class="fa fa-fw fa-home text-muted"></i>
                                    <span>Home</span>
                                </a>
                            @else
                                <a href="{{ url('/login') }}">
                                    <i class="fa fa-fw glyphicon-log-in text-muted"></i>
                                    <span>Login</span>
                                </a>
                                <a href="{{ url('/register') }}">
                                    <i class="fa fa-fw glyphicon-registration-mark text-muted"></i>
                                    <span>Register</span>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
                <!-- / navbar collapse -->
            </div>
        </div>
        <div class="app-footer">
            <div class="p-a text-xs">
                <div class="pull-right text-muted">
                    &copy; Copyright <strong>Flatkit</strong> <span
                            class="hidden-xs-down">- Built with Love v1.1.3</span>
                    <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
                </div>
                <div class="nav">
                    <a class="nav-link" href="/">About</a>
                    <span class="text-muted">-</span>
                    <a class="nav-link label accent" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Get
                        it</a>
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
<script src="/libs/jquery/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('.dataTable').DataTable();
    })
</script>
<!-- Bootstrap -->
<script src="/libs/jquery/tether/dist/js/tether.min.js"></script>
<script src="/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
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
</body>
</html>
