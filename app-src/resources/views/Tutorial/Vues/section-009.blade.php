@extends('Tutorial.Vues.layout')
@section('content')
    <h1>Vue Makes it so Easy</h1>

    <div id="app">
        <tasks :list="tasks"></tasks>
        <tasks :list="[
    {name: 'do something', completed: false},
    {name: 'something3', completed: true}
    ]"></tasks>
    </div>

    <template id="tasks-template">
        <h1>Tasks total: (@{{ list.length }}), remaining (@{{ remaining }})</h1>
        <p>remaining in method2: @{{ remaining2 }}</p>
        <p>remaining in method3: @{{ remaining3 }}</p>
        <p>remaining in method4: @{{ remaining4 }}</p>
        <p>remaining in method4: <span v-show="remaining4">@{{ remaining4 }}</span></p>
        <ul v-show="list.length">
            <li :class="{'completed': task.completed}"
                v-for="task in list" @click="task.completed = !task.completed"
            >@{{ task.name }} <strong @click="deleteTask(task)">X</strong>
            </li>
        </ul>
        <p v-else>No task yet!</p>
        <button @click="clearCompleted">Clear Completed</button>
    </template>

    <script>
        Vue.component('tasks', {
            template: '#tasks-template',
            props: ['list'],
            computed: {
                remaining: function () {
                    return this.list.filter(function (task) {
                        return !task.completed;
                    }).length;
                },
                remaining2: function () {
                    let vm = this;
                    return this.list.filter(function (task) {
                        return !vm.isCompleted(task);
                    }).length;
                },
                remaining3: function () {
                    let vm = this;
                    return this.list.filter(function (task) {
                        return vm.isInProgress(task);
                    }).length;
                },
                remaining4: function () {
                    let vm = this;
                    return this.list.filter(vm.isInProgress).length;
                }
            },
            methods: {
                isCompleted: function (task) {
                    return task.completed;
                },
                isInProgress: function (task) {
                    return !this.isCompleted(task);
                },
                deleteTask: function (task) {
                    this.list.$remove(task);
                },
                clearCompleted: function () {
                    this.list = this.list.filter(this.isInProgress);
                }
            }
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
