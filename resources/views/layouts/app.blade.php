<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/function.js') }}"></script>

    <!-- Fontawesome -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top ">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center w-100">
                    <a class="navbar-brand text-logo" href="{{ url('/') }}">CANVAS</a>
                    <ul class="navbar-nav mr-auto">
                        <form action="">
                            <input type="text" name="search" id="input-search" placeholder="Search...">
                        </form>
                    </ul>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                </div>    
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item"><a href="#" class="nav-link text-center active">HOME</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-center">PHONE</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-center">LAPTOP</a></li> 
                        <li class="nav-item"><a href="#" class="nav-link text-center">TABLE</a></li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link text-center"><i class="fas fa-search"></i></a>
                        </li> -->
                        <li class="nav-item">
                           
                            <a href="" class="nav-link text-center b4-navbar">
                                <i class="fas fa-shopping-cart"></i>
                                <span id="top-cart">5</span>
                            </a>
                           
                        </li>
                       
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-center" data-toggle="tooltip" title="Login" href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-center" data-toggle="tooltip" title="Register" href="{{ route('register') }}"><i class="fas fa-user-plus"></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span id="username">{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-2">
            @yield('content')
        </main>
    </div>
    <!-- <footer>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <p>KKKKKKKK</p>
                    <ul class="list-unstyled">
                        <li><a href="">KKKKKKKKKKK</a></li>
                        <li><a href="">KKKKKKKKKKK</a></li>
                        <li><a href="">KKKKKKKKKKK</a></li>
                        <li><a href="">KKKKKKKKKKK</a></li>
                    </ul>
                </div><div class="col-4">
                    <p>KKKKKKKK</p>
                    <ul class="list-unstyled">
                        <li><a href="">KKKKKKKKKKK</a></li>
                        <li><a href="">KKKKKKKKKKK</a></li>
                        <li><a href="">KKKKKKKKKKK</a></li>
                        <li><a href="">KKKKKKKKKKK</a></li>
                    </ul>
                </div><div class="col-4">
                    <p>KKKKKKKK</p>
                    <ul class="list-unstyled">
                        <li><a href="">KKKKKKKKKKK</a></li>
                        <li><a href="">KKKKKKKKKKK</a></li>
                        <li><a href="">KKKKKKKKKKK</a></li>
                        <li><a href="">KKKKKKKKKKK</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </footer> -->
    <script>
        $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
   
</body>
</html>
