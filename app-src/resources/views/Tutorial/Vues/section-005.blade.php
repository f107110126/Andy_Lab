@extends('Tutorial.Vues.layout')
@section('content')
    <h1>Computed Properties</h1>

    <h2>Skill: @{{ skill }}</h2>
    <p>Experience: <input type="number" v-model="points"></p>
    <button class="btn btn-primary" @click="points += 1">Add Experience +1</button>
    <button class="btn btn-primary" @click="points += 10">Add Experience +10</button>
    <button class="btn btn-primary" @click="points += 100">Add Experience +100</button>
    <br>
    <h1>@{{ fullName }}</h1>
    <h1>@{{ fullName2 }}</h1>
    <input type="text" v-model="first" placeholder="First name">
    <input type="text" v-model="last" placeholder="Last name">
    <script>
        new Vue({
            el: 'body',
            data: {
                points: 100,
                first: 'Andy',
                last: 'Chen',
                fullName: 'Andy Chen'
            },
            computed: {
                skill: function () {
                    if (this.points <= 100) return 'Beginner';
                    if (this.points <= 200) return 'Intermediate';
                    else return 'Advanced';
                },
                fullName2: function () {
                    return this.first + ' ' + this.last;
                }
            },
            watch: {
                first: function (first) {
                    this.fullName = first + ' ' + this.last;
                },
                last: function (last) {
                    this.fullName = this.first + ' ' + last;
                }
            }
        });
    </script>
@endsection
