<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>
    @yield('cdns')


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/navbare.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js" ></script>



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    .main-container{
        width: 100%;
        height: 100%;
    }
    </style>
<body>
    @yield('scripts')
    <div id="app">
        <div class="navbare-container">
            <div class="nav-items">
                <div class="nav-logo">
                    <img src="{{asset('images/logo.png')}}" alt="">
                </div>
                <div class="nav-menu">
                    <a href="/">
                        <li>Home</li>
                    </a>
                    @auth
                    <a href="{{route('Cars.index')}}">
                        <li>Cars</li>
                    </a>
                    @else
                    <a href="/">
                        <li>Review</li>
                    </a>
                    @endauth
                    <a href="/">
                        <li>Contact</li>
                    </a>
                    <a href="/">
                        <li>About</li>
                    </a>
                </div>
            </div>
            <div class="{{ request()->is('/') ? 'home-colors' : 'nav-account' }}">
                <div class="bars">
                    <a href="javascript:void(0);" class="icon" onclick="toggleToggledBar()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="toggled-bar" hidden>
                    <div class="tglback">
                        <a  href="javascript:void(0);" class="back" onclick="toggleToggledBar()">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="bar">
                        <div class="profile">
                            @auth
                                <div class="userIMG">
                                    <img src="{{ asset(Auth::user()->photo) }}" alt="" width="50px"
                                        height="50px">
                                </div>
                                <p class="username">
                                    {{ Auth::user()->name }}
                                </p>
                            @endauth
                        </div>
                        <div class="bar-items">Home</div>
                        <div class="bar-items">Reviews</div>
                        <div class="bar-items">Contact</div>
                        <div class="bar-items">About</div>
                        @guest
                            <a class="bar-items mt-3 mb-1" href="{{ route('login') }}">
                                Log in
                            </a>
                            <a class="bar-items" href="{{ route('register') }}">
                                Register
                            </a>
                        @else
                            <a href="{{ route('User.show', Auth::user()->id) }}" class="bar-items mt-3 mb-1">Profile
                            </a>
                            <a class="bar-items mt-0" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}"><button id="login-button">{{ __('Login') }}</button></a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"><button id="register-button">{{ __('Register') }}</button></a>
                    @endif
                @else
                    <div id="mini">
                        <div class="d-flex justify-content-center align-items-center ">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <span>
                                <img src="{{ asset(Auth::user()->photo) }}" alt="profile" width="30px"
                                    style="border-radius: 50%;">
                            </span>
                            <div class="dropdown-menu dropdown-menu-center pl-0" style="width: 170px;"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-center m-0" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a href="{{ route('User.show', Auth::user()->id) }}"
                                    class="dropdown-item text-center  m-0">Profile</a>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
        <div class="main-container">
            @yield('content')
        </div>
    </div>
</body>
<script>
    function toggleToggledBar() {
        const toggledBar = document.querySelector('.toggled-bar');
        toggledBar.hidden = !toggledBar.hidden;
    }
</script>
</html>
