@extends('Tutorial.Vues.layout')

@section('content')
    <div id="app">
        <h5>Stored messages</h5>
        <ul>
            <li v-for="message in messages">@{{ message }}</li>
        </ul>
        <message @new-message="handleNewMessage"></message>
    </div>
    <script>
        Vue.component('message', {
            template: '<input v-model="message" @keyup.enter="storeMessage">',
            data: function () {
                return {message: ''};
            },
            methods: {
                storeMessage: function () {
                    console.log('storing: ' + this.message);
                    // $dispatch
                    // $broadcast
                    this.$dispatch('new-message', this.message);
                    this.message = '';
                }
            }
        });
        new Vue({
            el: '#app',
            // events: {
            //     'new-message': function (message) {
            //         console.log('Parent is handling ' + message);
            //     }
            // }
            data: {
                messages: []
            },
            methods: {
                handleNewMessage: function (message) {
                    // console.log('root handle: ' + message);
                    this.messages.push(message);
                }
            }
        });
    </script>
@endsection
