<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('client/bootstrap/jquery-3.2.1.slim.min.js') }}"></script>    
    <script src="{{ asset('client/js/jquery.js') }}"></script>
    <script src="{{ asset('client/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('client/bootstrap/bootstrap.bundle.min.js') }}"></script>    
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/toastr.css') }}">    
    <script src="{{ asset('client/js/toastr.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('client/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/app.css') }}" rel="stylesheet">
    @stack('extraStyles')
</head>
<body>
    @include('layouts.notification')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('modules.category.title') }}</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('categories.create') }}">{{ __('modules.category.menu.add') }}</a>
                                <a class="dropdown-item" href="{{ route('categories.index') }}">{{ __('modules.category.menu.view') }}</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('modules.product.title') }}</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('products.create') }}">{{ __('modules.product.menu.add') }}</a>
                                <a class="dropdown-item" href="{{ route('products') }}">{{ __('modules.product.menu.view') }}</a>
                            </div>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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
        <main class="main-class">
            @yield('content')            
        </main>
    </div>
    <script src="{{ asset('client/js/sweetalert2@11.js') }}"></script>
    <script type="text/javascript">        
        function deleteRecord(id,url) {        
            Swal.fire({
              title: 'Are you sure you want to delete this record?',              
              showCancelButton: true,
              confirmButtonText: `Delete`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    data: {'id': id,"_token": "{{ csrf_token() }}"},
                    success: function(data){                        
                            if(data.status==200) {
                                location.reload();
                            }
                        }
                    });
              } 
            })  
         }
    </script>
    @stack('extraScripts')
</body>
</html>
