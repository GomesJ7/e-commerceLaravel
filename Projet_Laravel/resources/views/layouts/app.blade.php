<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/produit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/catalogue.css') }}" rel="stylesheet">

    <!-- Logo -->
    <link href="{{ asset('image/logo.png') }}" rel="SHORTCUT ICON">
</head>
<header>
<a href="{{ url('/catalogue') }}" class="text-sm nav-link text-gray-700 underline">
    <img class="logo" src="{{ asset('image/logo1.png')}}" width="200" height="auto"></a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
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
                
                <li class="nav-item">    
                    <a href="{{ url('/catalogue') }}" class="text-sm nav-link text-gray-700 underline">
                        Home
                    </a>
                </li>
                    
                <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        @if(Auth::user()->role=='admin')
                        <div class="dropdown-content">
                            <a href="{{ url('/admin') }}">Admin</a> 
                        </div>
                        @endif
                    </li>                               
                    <li class="nav-item">
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
</header>    
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer>
        <div>
            <nav>
                <a href="#">
                    <img src="{{asset('image/twitter.png') }}" alt="twitter logo" width="50px" height="50px">
                </a>
                <a href="#">
                    <img src="{{ asset('image/facebook.png') }}" alt="facebook logo" width="50px" height="50px">
                </a>
            </nav>
        </div>
    </footer>

</html>
