@extends('Tutorial.Vues.layout')
@section('content')
    <h1>Vue Show</h1>

    <div id="app">
        <form>
            <div class="form-group">
                <!-- attribute 'v-model' can binding data internal the vue app -->
                <!-- attribute 'v-show' can hiding element by css dependence on some condition -->
                <!-- attribute 'v-if' will remove entire element if condition is false -->
                <label for="message">Example textarea</label>
                <span class="text-danger" v-show="!message">You must enter a message</span>
                <textarea id="message" class="form-control" v-model="message"></textarea>
                <button class="btn btn-primary" v-if="!!message">Send Message</button>
            </div>
        </form>
        <pre>@{{ $data | json }}</pre>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                message: ''
            }
        });
    </script>
@endsection
