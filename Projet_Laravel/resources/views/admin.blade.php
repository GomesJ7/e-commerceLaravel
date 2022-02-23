<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}" media="screen" type="text/css" />
        
        <link rel="SHORTCUT ICON" href="image/logo.png">
        <title>Star Drone</title>

    </head>
    <header>
    <img class="logo" src="{{ asset('image/logo1.png')}}" width="200" height="auto">
    
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <center>
            <button onclick="get_count()">Refresh</button>
            
            <div class="bloc">
                <h2> New Product</h2>
                <form method="post" enctype="multipart/form-data" action="save">                    
                    @csrf
                    <label>Product name: </label><input type="text" size="20" maxlength="40" name="name" autofocus><br><br>
                    <label>Description: </label><br> <textarea id="content" name="description"></textarea><br><br>
                    <label>Photo: </label><input type="file" id="image" name="image" accept="image/*" autofocus><br><br>
                    <label>Price: </label><input type="number" step="0.01" size="10" maxlength="40" name="price" autofocus><br><br>
                    <label>Stock: </label><input type="number" size="10" maxlength="40" name="stock" autofocus><br>
                <div class="envoi">
                        <button type="submit">Send</button>
                </div>
                </form>
            </div>
        </center>
        <script src="{{ asset('javascript/admin.js') }}"></script>
            
    </body>
</html>