@extends('Tutorial.Vues.layout')
@section('content')
    <h1>A Peek into Components</h1>

    <div id="app">
        <component1></component1>
        <counter subject="Likes"></counter>
        <counter subject="Dislikes"></counter>
        <counter2 subject="Third Sample"></counter2>
        <pre>@{{ $data | json }}</pre>
    </div>
    <template id="counter-template">
        <h1>@{{ subject }}</h1>
        <button class="btn btn-primary" @click="count += 1">Increment @{{ count }}</button>
        <pre>@{{ $data | json }}</pre>
    </template>
    <template id="counter2">
        <h1>@{{ count }}</h1>
        <h2>@{{ subject }}</h2>
        @{{ name }}
        <button class="btn btn-primary" @click="count += 1">Add Count</button>
    </template>
    <script>
        Vue.component('component1', {
            template: '<h1>Hello World.</h1>'
        });
        Vue.component('counter', {
            template: '#counter-template',
            props: ['subject'],
            data: function () {
                return {count: 0};
            }
        });
        new Vue({
            el: '#app',
            components: {
                counter2: {
                    template: '#counter2',
                    props: {
                        subject: {default: 'default subject'},
                        name: {default: 'default name'}
                    },
                    data: function () {
                        return {count: 0};
                    }
                }
            }
        });
    </script>
@endsection
