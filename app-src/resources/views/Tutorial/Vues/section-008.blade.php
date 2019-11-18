@extends('Tutorial.Vues.layout')
@section('content')
    <h1>Custom Components 101</h1>

    <div id="app">
        <tasks :list="tasks"></tasks>
        <tasks :list="[
    {name: 'do something', completed: false},
    {name: 'something2', completed: false},
    {name: 'something3', completed: true}
    ]"></tasks>
    </div>

    <template id="tasks-template">
        <ul>
            <li :class="{'completed': task.completed}"
                v-for="task in list" @click="task.completed = !task.completed"
            >@{{ task.name }}
            </li>
        </ul>
    </template>

    <script>
        Vue.component('tasks', {
            template: '#tasks-template',
            props: ['list']
        });
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
            }
        });
    </script>
@endsection
