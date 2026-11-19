<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/media.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @yield('head')
</head>
<body>
    <div class="container">
        <div class="header-nav">
            <!-- меню навигации -->
            <a class="logo" href="{{ route('index') }}"><img src="{{ asset('assets/img/logo.png') }}"></a>

            <nav id="nav" class="nav">
                <ul class="nav-list">
                    <li class="nav-item"><a href="{{ route('index') }}" class="nav-link">Главная</a></li>
                    <li class="nav-item"><a href="{{ route('table') }}" class="nav-link">Расписание</a></li>
                    @if(auth()->check())
                        <li class='nav-item'><a href='{{ route('lk') }}' class='nav-link'>Личный кабинет</a></li>
                        <li class='nav-item'><a href='{{ route('logout') }}' class='nav-link'>Выход</a></li>
                    @else
                        <li class='nav-item'><a href='{{ route('login') }}' class='nav-link'>Авторизация</a></li>
                    @endif
                </ul>
                <button id="nav-btn" class="nav-button">
                    <img id="nav-btn-img" src="{{ asset('assets/img/NAV.svg') }}">
                </button>
            </nav>
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
