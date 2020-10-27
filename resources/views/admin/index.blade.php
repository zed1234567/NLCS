<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fontawesome -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    
   <div class="wrapper">
       <ul class="navbar-nav sidebar backgroud">
            <a href="{{ route('admin.index') }}" class="text-center logo">Canvas Admin</a><hr>

            <li class="nav-item"><a href="" class="nav-link">Dashboard</a></li><hr>
            <p class="sidebar-title">Action</p>
        
            <li class="nav-item">
                <a href="#showall" data-toggle="collapse" class="nav-link link-collapse">
                    Show<i class="fas fa-chevron-down icon-down float-right"></i>
                </a>
                <ul id="showall" class="collapse background-collapse list-unstyled">
                    <li><a href="{{ route('product.index') }}" class="collapse-item">Product</a></li>
                    <li><a href="{{ route('invoice.index') }}" class="collapse-item">Invoice</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#addproduct" data-toggle="collapse" class="nav-link link-collapse">
                    Add<i class="fas fa-chevron-down icon-down float-right"></i>
                </a>
                <ul id="addproduct" class="collapse background-collapse list-unstyled">
                    <li><a href="{{ route('product.create')}}" class="collapse-item">Product</a></li>
                    <li><a href="{{ route('product.GB') }}" class="collapse-item">Group - Brand</a></li>
                   
                </ul>
            </li>
       </ul>
       <div class="main-content">
           
            <nav class="navbar navbar-expand-sm navbar-light bg-light shadow">

                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="collapsibleNavId">
                    <div class="d-flex flex-row justify-content-between align-items-center w-100">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown mr-3 dropleft">
                                <a href="" class="nav-link font-size-icon" data-toggle="dropdown">
                                    <span class="notice">5+</span><i class="fas fa-bell"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <p class="dropdown-header">Alert Center</p>
                                    <li class="dropdown-item">No notice</li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown mr-3 dropleft">
                                <a href="" class="nav-link font-size-icon" data-toggle="dropdown">
                                   <span class="notice">5+</span><i class="far fa-envelope"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <p class="dropdown-header">Mail Center</p>
                                    <li class="dropdown-item">No Mail</li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown dropleft last-item">

                                <a href="" class="nav-link font-size-icon" data-toggle="dropdown">
                                    Nguyen Van A
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <a href="" class="nav-link"><i class="far fa-user mr-2"></i>Profile</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="" class="nav-link"><i class="fas fa-cogs mr-2"></i>Setting</a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <li class="dropdown-item">
                                        <a href="" class="nav-link"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                                    </li>
                                </ul>
                            </li>
                            

                        </ul>
                    </div>
                    
                </div>
            </nav>
            
            <main class="py-2">
                @yield('content')
            </main>
           
       </div>
   </div>
  
    
</body>
</html>