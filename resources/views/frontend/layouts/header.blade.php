<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('storage/frontend/images/default/favicon.ico') }}" type="image/x-icon">
    <title> Blog | @yield('page-title') </title>
    <!-- VENDORS CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/vendors/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/css/normalize.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet')">
    <!-- RECOURCES CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/recources/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/recources/css/responsive.css') }}">
</head>
<body>
    <!-- PRELOADER -->
    <div class="loader">
        <div class="loader-item">
            <div class="loader-logo text-dark">Blog</div>
            <div class="loader-progress">
                <div class="loader-progress-animated"></div>
            </div>
        </div>
    </div>
    <!-- HEADER SECTION -->
    <header id="header" class="box-shadow">
        @php
            $session_userData = Session::get('userData');
        @endphp

        @if ($session_userData!=Null)
            <nav class="container navbar">
                <a href="{{ url('/') }}" class="nav-brand text-dark">Blog</a>
                <div class="toggle-button">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
                <div class="collapse">
                    <ul class="navbar-nav">
                        @foreach ($navBars as $navBar)
                            <a href="{{ url($navBar->menuUrl) }}" class="nav-link active-it removeNav">{{ $navBar->menuName }}</a>
                        @endforeach
                    </ul>
                </div>
                <div class="collapse">
                    <ul class="navbar-nav">
                        <div class="search-box pr-2">
                            <form action="#">
                                <input type="text" placeholder="Search.." class="search-bar" name="search">
                                <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <a href="{{ url('/profile') }}" class="nav-link"><i class="fas fa-user"></i><span class="ml-1">{{ Session::get('userData')['userName'] }}</span></a>
                        <a href="{{ url('/profile/logout') }}" class="nav-link"><i class="fas fa-power-off"></i><span class="ml-1">log out</span></a>
                    </ul>
                </div>
            </nav>
        @else
            <nav class="container navbar small-navbar">
                <a href="{{ url('/') }}" class="nav-brand text-dark">Blog</a>
                <ul class="navbar-nav">
                    <a href="{{ url('/profile/login') }}" class="nav-link"><i class="fas fa-user-lock"></i><span class="ml-1">log in</span></a>
                    <a href="{{ url('/profile/sign-up') }}" class="nav-link"><i class="fas fa-user-plus"></i><span class="ml-1">register</span></a>
                </ul>
            </nav>
        @endif
        
    </header>