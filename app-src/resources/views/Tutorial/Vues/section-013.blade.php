<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Learning Vue 1.0: Step By Step</title>

    <!-- for bootstrap 4.3.1 -->
    <script src="{{ asset('asset/jquery-3.4.1-dist/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('asset/popper.js-1.16.0-dist/umd/popper.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-4.3.1-dist/css/bootstrap.css') }}">
    <script src="{{ asset('asset/bootstrap-4.3.1-dist/js/bootstrap.js') }}"></script>

    <!-- for vue -->
    {{-- <script src="{{ asset('asset/vue-1.0.24.js') }}"></script> --}}
    {{-- <script src="{{ asset('asset/vue-resource-1.5.1-dist/vue-resource.js') }}"></script> --}}

</head>
<body>
<div class="container">
    <h1>Episode 13 - Vue and Laravel Workflow</h1>
    <div id="app">
        <pre>@{{ $data }}</pre>
        <component is="checkout-view"></component>
    </div>
</div>
<script src="{{ asset('js4vue/app.js') }}"></script>
</body>
</html>
