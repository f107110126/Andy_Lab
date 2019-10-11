<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Laravel')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Latest CSS files for bulma and font-awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <!-- Styles -->

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-left {
            position: absolute;
            left: 10px;
            top: 18px;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
    @yield('style-ext')
</head>
<body>
<div class="flex-center position-ref full-height">
    @if(isset($IsFromController))
        <div class="top-left links">
            <a href="javascript:void(0);">This Page is loaded from Controller</a>
        </div>
    @endif
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            @yield('full-title', 'No Title')
        </div>

        @yield('content', View::make('Tutorial.blank'))

        <div class="links">
            <a href="{{ Route('Tutorial.home') }}">Home</a>
            <a href="{{ Route('Tutorial.contact') }}">Contact</a>
            <a href="{{ Route('Tutorial.about') }}">About Us</a>
            <a href="{{ Route('Tutorial.task') }}">Tasks</a>
        </div>
        <div class="links">
            <a href="{{ Route('Tutorial.Controller.home') }}">Controller@Home</a>
            <a href="{{ Route('Tutorial.Controller.about') }}">Controller@About</a>
            <a href="{{ Route('Tutorial.Controller.contact') }}">Controller@Contact</a>
        </div>
        <div class="links">
            <a href="{{ Route('Tutorial.projects.index') }}">Projects</a>
            <a href="{{ Route('project2s.index') }}">Projects 2</a>
        </div>
    @yield('links-area')
    <!--
        <div class="links">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://vapor.laravel.com">Vapor</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
        -->
    </div>
</div>
</body>
</html>
