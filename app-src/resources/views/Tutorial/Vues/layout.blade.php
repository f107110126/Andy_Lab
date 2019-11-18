<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue-1.0.24-Tutorial</title>

    <!-- for bootstrap 4.3.1 -->
    <script src="{{ asset('asset/jquery-3.4.1-dist/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('asset/popper.js-1.16.0-dist/umd/popper.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-4.3.1-dist/css/bootstrap.css') }}">
    <script src="{{ asset('asset/bootstrap-4.3.1-dist/js/bootstrap.js') }}"></script>

    <!-- for vue -->
    <script src="{{ asset('asset/vue-1.0.24.js') }}"></script>
    <style>
        .completed {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>
