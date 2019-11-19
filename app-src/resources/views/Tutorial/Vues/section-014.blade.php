@extends('Tutorial.Vues.layout')

@section('content')
    <div id="app">
        <h1>@{{ 'hello world' | uppercase }}</h1>
        <h1>@{{ '5' | currency }}</h1>
        <h1>@{{ '5' | currency '£' }}</h1>
        <!-- <pre>@{{ $data | json }}</pre> -->
        <!-- <pre>@{{ $data | jsonIt }}</pre> -->
        <ul>
            <li v-for="person in people | orderBy 'name' | limitBy 2">@{{ person.name }}</li>
        </ul>
        <ul>
            <li v-for="person in people | orderBy 'name' -1">@{{ person.name }}</li>
        </ul>
        <h4>Admins</h4>
        <ul>
            <li v-for="person in people | role 'admin'">@{{ person.name }}</li>
        </ul>
        <h4>Students</h4>
        <ul>
            <li v-for="person in people | role 'student'">@{{ person.name }}</li>
        </ul>
    </div>
    <script>
        Vue.filter('jsonIt', function (value) {
            return JSON.stringify(value);
        });
        Vue.filter('role', function (value, role) {
            return value.filter(function (item) {
                return item.role === role;
            });
        }); // people | role 'admin'
        new Vue({
            el: '#app',
            data: {
                message: 'hello',
                people: [
                    {name: 'Joe', role: 'admin'},
                    {name: 'Susan', role: 'admin'},
                    {name: 'Frank', role: 'student'},
                    {name: 'Jeffrey', role: 'admin'}
                ]
            }
        });
    </script>
@endsection
