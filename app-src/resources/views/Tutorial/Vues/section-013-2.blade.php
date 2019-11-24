<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learning Vue 1.0: Step By Step</title>
    <link rel="stylesheet" href="{{ asset('vue-1.0/css/app.css') }}">
    <script src="{{ asset('vue-1.0/js/app.js') }}" defer></script>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
</head>
<body>
<h1>Episode 13 - Vue and Laravel Workflow</h1>
<div id="app">
    <alert>
        <strong>General!</strong> Your account has no change.
    </alert>
    <alert type="success">
        <strong>Success!</strong> Your account has been updated.
    </alert>
    <alert2 type='success'>
        <strong>Success, again!</strong>
    </alert2>
    <alert2 type='error'>
        <strong>Error!</strong> Your account has not been updated.
    </alert2>
</div>
</body>
</html>
