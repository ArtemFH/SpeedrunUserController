<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @section('head')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{url("/images/logo.png")}}" type="image/png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link href="{{ asset('assets/css/app.css') }}" media="all" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/media.css') }}" media="all" rel="stylesheet" type="text/css"/>
        <script src="{{ asset('assets/script/media.js') }}"></script>
    @show
</head>
<body id="bootstrap-overrides">
@section('nav')
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" id="navbar">
        <img class="logoImg" src={{url("/images/logo.png")}}>
        <h2>Funtikoff</h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                @auth()
                    @can('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">Админ-панель</a>
                        </li>
                    @endcan
                @endauth
            </ul>
            @auth()
                <div class="nav-end" id="but-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link button-navbar" href="{{ route('topic.create') }}">Создать новую тему</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link button-navbar" href="{{ route('user.logout') }}">Выйти из аккаунта</a>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest()
                <div class="nav-end" id="but-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link button-navbar" href="{{ route('user.login') }}">Авторизоваться</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link button-navbar" href="{{ route('user.registration') }}">Зарегистрироваться</a>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </nav>
@show
<div class="padding-top">
    @section('body')
    @show
    @section('topic')
    @show
</div>
@section('footer')
    <footer id="footer" class="footer-scroll">
        <div>
            <p>© Copyright 2021</p>
        </div>
    </footer>
@show
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
            crossorigin="anonymous"></script>
@show
</body>
</html>
