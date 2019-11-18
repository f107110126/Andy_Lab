@extends('Tutorial.Vues.layout')
@section('content')
    <tasks></tasks>
    {{-- <tasks list="{{ json_encode($tasks) }}"></tasks> --}}
    {{-- This will work fine as above. --}}
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
                    let resource = this.$resource('{{ route('vue.api.tasks') }}{/id}');
                    console.log('{{ route('vue.api.tasks') }}{/:id}');
                    // this is not work anymore, old version:
                    // this.$http.get(function (tasks) {
                    //     this.list = tasks;
                    // }.bind(this));
                    // more reference: https://github.com/pagekit/vue-resource/blob/develop/docs/resource.md
                    resource.get({id: 1}).then(response => {
                        console.log(response.body);
                    });
                    resource.get()
                        .then(response => {
                            console.log(response.body);
                            this.list = response.body;
                        });
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
