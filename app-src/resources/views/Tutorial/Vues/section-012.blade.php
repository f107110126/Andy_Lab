<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Learning Vue 1.0: Step By Step</title>

    <!-- for bootstrap 4.3.1 -->
    <script src="{{ asset('asset/jquery-3.4.1-dist/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('asset/popper.js-1.16.0-dist/umd/popper.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('asset/bootstrap-4.3.1-dist/css/bootstrap.css') }}">
    <script src="{{ asset('asset/bootstrap-4.3.1-dist/js/bootstrap.js') }}"></script>

    <!-- for vue -->
    <script src="{{ asset('asset/vue-1.0.24.js') }}"></script>
    <script src="{{ asset('asset/vue-resource-1.5.1-dist/vue-resource.js') }}"></script>

    <style>
        .Alert {
            position: relative;
            background: #ddd;
            border: 1px solid #c7c7c7;
            padding: 1em;
        }

        .Alert--Success {
            background: #8cff8c;
            border: 1px solid #005a00;
            padding: 1em;
        }

        .Alert--Error {
            background: #ffb3b3;
            border: 1px solid #b30000;
            padding: 1em;
        }

        .Alert__close {
            position: absolute;
            top: 1em;
            right: 1em;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Episode 12 - Component Exercise #1</h1>
    <alert>
        <strong>General!</strong> Your account has no change.
    </alert>
    <alert type="success">
        <strong>Success!</strong> Your account has been updated.
    </alert>
    <alert2 type='success'>
        <strong>Success, again!</strong>
    </alert2>
    <alert2 type='error'>
        <strong>Error!</strong> Your account has not been updated.
    </alert2>
</div>
<template id="alert-template">
    <div :class="['Alert', type === 'success' ? 'Alert--Success' : '']" v-show="show">
        <slot></slot>
        <span class="Alert__close" @click="show = false">X</span>
    </div>
</template>
<template id="alert-template2">
    <div :class="alertClasses" v-show='show'>
        <slot></slot>
        <span class="Alert__close" @click='show = false'>X</span>
    </div>
</template>
<script>
    Vue.component('alert', {
        template: '#alert-template',
        props: ['type'],
        data: function () {
            return {show: true};
        }
    });

    Vue.component('alert2', {
        template: '#alert-template2',
        props: ['type'],
        data: function () {
            return {show: true};
        },
        computed: {
            alertClasses: function () {
                var type = this.type;
                return {
                    'Alert': true,
                    'Alert--Success': type === 'success',
                    'Alert--Error': type === 'error'
                }
            }
        }
    });

    new Vue({
        el: 'body'
    });
</script>
</body>
</html>
