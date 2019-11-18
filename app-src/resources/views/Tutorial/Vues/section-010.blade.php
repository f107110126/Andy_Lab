@extends('Tutorial.Vues.layout')
@section('content')
    @if (isset($tasks) && $tasks->count() > 0)
        <tasks></tasks>
        {{-- <tasks list="{{ json_encode($tasks) }}"></tasks> --}}
        {{-- This will work fine as above. --}}
    @endif
    <template id="tasks-template">
        <h1>Vue Tasks</h1>
        <ul class="list-group">
            <li class="list-group-item" v-for="task in list">
                @{{ task.content }}
                <strong @click="deleteTask(task)">X</strong>
            </li>
        </ul>
    </template>
    <script>
        // Version 1
        // Vue.component('tasks', {
        //     template: '#tasks-template',
        //     props: ['list'],
        //     created() {
        //         this.list = JSON.parse(this.list);
        //     }
        // });
        Vue.component('tasks', {
            template: '#tasks-template',
            data: function () {
                return {list: []};
            },
            created() {
                this.fetchTaskList();
                // version 2
                // $.getJSON('{{ route('vue.api.tasks') }}', function (tasks) {
                //     this.list = tasks;
                // }.bind(this));
            },
            methods: {
                fetchTaskList: function () {
                    $.getJSON('{{ route('vue.api.tasks') }}', function (tasks) {
                        this.list = tasks;
                    }.bind(this));
                },
                deleteTask: function (task) {
                    this.list.$remove(task);
                }
            }
        });
        new Vue({
            el: 'body'
        });
    </script>
@endsection
