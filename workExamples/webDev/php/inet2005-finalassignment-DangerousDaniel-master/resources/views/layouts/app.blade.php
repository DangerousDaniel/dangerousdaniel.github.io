<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    @if(Request()->cookie('theme'))
        <link href="{{Request()->cookie('theme')}}" rel="stylesheet">
    @else
        <link href="{{\App\Theme::where('is_default', '=', true)->get()->first()->cdn_url}}" rel="stylesheet" >
    @endif


    <script>
        var timestamp = Date.now()

        function doFetch() {
            //get some data
            //http://localhost:8000/ajaxposts -> controller method

            var url = "http://localhost:8000/ajaxposts" + timestamp.toString();
            console.log(url)
            fetch(url) //GET
                .then(response => response.text())
                .then(text => {
                    timestamp = Date.now(); //update the timestamp for the next fetch
                    if(text.length > 0){ //sometimes we get nothing back from the fetch...because there is no new data
                        var postsDiv = document.getElementById('posts');
                        postsDiv.innerHTML = text + postsDiv.innerHTML; //add to the posts div
                    }
                    //call doFetch again in 3 seconds....recursive
                    setTimeout(doFetch, 3000)
                })
                .catch(err => {
                    //catch any fetch issues and start another fetch
                    console.log(err)
                    setTimeout(doFetch, 3000)
                })
        }

        //get the fetch started
        setTimeout(doFetch, 3000)
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
{{--                    {{ config('app.name', 'Laravel') }}--}}
                    Final Project
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

{{--                my nav bar--}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">


                        @auth
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Fav</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Your Lists</a>
                            </li>
                        @endauth

                        @auth
                            @if(!empty(Auth::user()->hasRole('User Admin')))
                            <li class="nav-item active">
                                <a class="nav-link" href="/users">Users</a>
                            </li>
                            @endif

                            @if(!empty(Auth::user()->hasRole('Theme Admin')))
                            <li class="nav-item active">
                                <a class="nav-link" href="/theme">Theme</a>
                            </li>
                            @endif
                        @endauth

                    </ul>
                </div>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <br>

        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>
