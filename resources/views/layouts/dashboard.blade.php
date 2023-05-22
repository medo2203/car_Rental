<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%">

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
    <link rel="stylesheet" href="css/navbare.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .nav-link {
            margin: 10px;
        }

        .nav-item {
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-item:hover {
            background-color: #0d6efd;
        }

        .nav-item:hover .notification-bubble {
            background-color: #212529;
        }

        .notification-bubble {
            background: #0d6efd;
            height: 20px;
            width: 20px;
            text-align: center;
            font-size: small;
            border-radius: 50%;
        }
    </style>
</head>

<body style="height: 100%">
    @yield('scripts')
    <div class="d-flex" style="width: 100%;height:100%">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 15%;height:100%">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-6" style="text-align: center;">Admin Control panel</span>
            </a>
            <hr>
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link " href="#">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Orders</a>
                    <span class="notification-bubble">@yield('ordersNotification')</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>
            </ul>
            <div class="dropdown position-absolute bottom-0 pb-4">
                <hr style="width: 240px">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div style="width: 90%">
            @yield('controlPanel')
        </div>
    </div>
</body>

</html>
