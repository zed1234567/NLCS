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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                        <form method="GET" action="{{ route('search') }}" class="form-inline my-2 my-lg-0 form-search">
                            @csrf
                            <input class="form-control mr-sm-2" id="input-search" name="key" type="text" placeholder="Search" autocomplete="off">
                            <button class="btn" type="submit"><i class="fas fa-search "></i></button>
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
                        <li class="nav-item"><a href="{{ route('index') }}" class="nav-link text-center">HOME</a></li>
                        <li class="nav-item"><a href="{{ route('smartphone') }}" class="nav-link text-center">PHONE</a></li>
                        <li class="nav-item"><a href="{{ route('laptop') }}" class="nav-link text-center">LAPTOP</a></li> 
                        <li class="nav-item"><a href="{{ route('table') }}" class="nav-link text-center">TABLET</a></li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link text-center"><i class="fas fa-search"></i></a>
                        </li> -->
                        <li class="nav-item">
                           
                            <a href="{{ route('cart.index') }}" class="nav-link text-center b4-navbar">
                                <i class="fas fa-shopping-cart"></i>
                                <span id="top-cart">{{ count((array)session('cart'))}}</span>
                            </a>
                           
                        </li>
                       
                        <!-- @guest
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
                        @endguest -->

                    </ul>
                </div>
            </div>
            
            
        </nav>
      
        <main class="py-2">
            @yield('content')
        </main>

    </div>

    <footer class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <ul class="list-unstyled list-footer">
                    <li><a href="#">Giới thiệu về công ty</a></li> 
                    <li><a href="#">Câu hỏi thường gặp mua hàng</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li> 
                    <li><a href="#">Quy chế hoạt động</a></li>
                    <li><a href="#">Kiểm tra hóa đơn điện tử</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <ul class="list-unstyled list-footer">
                    <li><a href="#">Tin tuyển dụng</a></li> 
                    <li><a href="#">Tin khuyến mãi</a></li>
                    <li><a href="#">Hướng dẫn mua online</a></li> 
                    <li><a href="#">Hướng dẫn mua trả góp</a></li>
                    <li><a href="#">Chính sách trả góp</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <ul class="list-unstyled list-footer text-center">
                    <li>Gọi khiếu nại <span class="text-danger">1800.4321</span>  (8:00 - 21:30)</li>
                    <li>Gọi bảo hành <span class="text-danger">1800.5678</span>  (8:00 - 21:00)</li> 
                    <li>Kỹ thuật <span class="text-danger">1800.8765</span>  (7:30 - 22:00)</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <p>Theo dõi để nhận khuyến mãi</p>
                <div class="d-flex  icon-footer justify-content-center">
                    <i class="fab fa-facebook-square"></i> 
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
        </div>
    </footer>
    <script>
        $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip();
             $('.toast').toast('show');
        });

        var currentPage = document.getElementsByClassName('nav-link');
        for(var i =0; i<=currentPage.length ;i++){
            if(currentPage[i].href == window.location.href){
                currentPage[i].classList.add('active');
            }
        }
    </script>
   
</body>
</html>
