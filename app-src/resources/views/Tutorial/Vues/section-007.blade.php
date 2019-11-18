@extends('Tutorial.Vues.layout')
@section('content')
    <h1>Rendering and Working With Lists</h1>

    <div id="app">
        <ul>
            <li :class="{'completed': task.completed}"
                v-for="task in tasks" @click="toggleCompletedFor(task)"
            >@{{ task.name }}
            </li>
        </ul>
        <ul>
            <li :class="{'completed': task.completed}"
                v-for="task in tasks" @click="task.completed = ! task.completed"
            >@{{ task.name }}
            </li>
        </ul>
        <ul>
            <li :class="sample1" v-for="task in tasks">@{{ task.name }}</li>
        </ul>
        <ul>
            <li :class="'sample1'" v-for="task in tasks">@{{ task.name }}</li>
        </ul>
        <ul>
            <li :class="[sample1, 'sample1']" v-for="task in tasks">@{{ task.name }}</li>
        </ul>
        <ul>
            <li :class="[sample1, 'sample1', condition ? 'true' : 'false']" v-for="task in tasks">@{{ task.name }}</li>
        </ul>
        <ul>
            <li :class="{'true': condition}" v-for="task in tasks">@{{ task.name }}</li>
        </ul>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                sample1: 'here',
                condition: true,
                tasks: [
                    {name: 'Go to the bank.', completed: false},
                    {name: 'Go to the store.', completed: false},
                    {name: 'Go to the doctor.', completed: true}
                ]
            },
            methods: {
                toggleCompletedFor: function (task) {
                    task.completed = !task.completed;
                }
            }
        });
    </script>
@endsection
