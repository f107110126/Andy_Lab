@extends('Tutorial.Vues.layout')
@section('content')
    <h1>Hello DataBinding</h1>

    <div id="app">
        <h1>@{{ message }}</h1>
        <input type="text" v-model="message">

        <pre>@{{ $data | json }}</pre>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                message: 'Hello world'
            }
        });
    </script>
@endsection
