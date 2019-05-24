<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="favicon" href="{{ asset('image/logo.png') }}" type="image/png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KazEDU') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mobile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="//use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.min.css') }}">
</head>
<body>
<div id="admin" class="wrapper bg-admin">
    <div class="navbar navbar-expand-md header_menu bg_white">
        <div class="navbar_header">
            <div class="header_logo">
                <?php
                        $id = Auth::user()->id;
                        $role = KazEDU\Roles::where('id', '=', $id)->value('roles_user');
                ?>
                <a href="{{ route('homepage', $role) }}">
                    <img src="{{ asset('image/logo.png') }}">
                </a>
            </div>
            <div class="toogle-button sidebar-toogle">
                <button type="button" class="item_link">
                    <span class="btn_icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
            <div class="d-md-none mobile_nav">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile_navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button class="navbar-toggler sidebar-toggle-mobile" type="button">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <div class="header_menu_1 collapse navbar-collapse" id="mobile_navbar">
            <ul class="navbar-nav">
                <li class="navbar_item header_search">
                    <div class="input-group style_input_group">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="navbar_item dropdown header_admin">
                    <a class="navbar_nav_link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <div class="admin_title">
                            <h5 class="item_title">{{ Auth::user()->username }}</h5>
                            <span></span>
                        </div>
                        <div class="admin_img">
                            <img src="{{ asset('image/admin/admin.jpg') }}">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="item_header">
                            <h6 class="item_title">{{ Auth::user()->username }}</h6>
                        </div>
                        <div class="item_content">
                            <ul class="settings-list">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="flaticon-turn-off"></i> Выйти</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navbar_item header_language">
                    <a class="navbar_nav_link">
                        <i class="fas fa-globe-americas"></i>
                        Russian
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    @yield('content')
</div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>