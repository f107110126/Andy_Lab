@extends('Tutorial.Vues.layout')
@section('content')
    <h1>Event Handling</h1>

    <div id="app">
        <form method="post" @submit="handler1">
            this is form 1.
            <button class="btn btn-primary">Submit Me!</button>
        </form>
        <form method="post" @submit.prevent="handler2">
            <!-- at here the string 'prevent' could be 'stop' or something else. -->
            this is form 2.
            <button class="btn btn-primary">Submit Me!</button>
        </form>
        <form method="post" @submit.prevent="handler2">
            <!-- at here the string 'v-on:' could be replaced by '@'. -->
            this is form 3.
            <!-- and so on, this method could use on any element any event. -->
            <button class="btn btn-primary" @click="clickHandler">Submit Me!</button>
        </form>
        <button @click="addCount1">click me to add @{{ count1 }}</button>
        <button @click="addCount2">click me to add @{{ count2 }}</button>
        <button @click="count3 += 1">click me to add @{{ count3 }}</button>
        <pre>@{{ $data | json }}</pre>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                count1: 0,
                count2: 0,
                count3: 0
            },
            methods: {
                handler1: (e) => {
                    alert('handled');
                    e.preventDefault();
                },
                handler2: () => {
                    alert('handled by handler 2.');
                },
                clickHandler: () => {
                    alert('clicked button.');
                },
                addCount1: function () {
                    this.count1 += 1;
                },
                // noticed, if function defined like following, it will not work for read app's variable.
                addCount2: () => {
                    this.count2 += 1;
                }
            }
        });
    </script>
@endsection
