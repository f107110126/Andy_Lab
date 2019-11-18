@extends('Tutorial.Vues.layout')
@section('content')
    <h1>Subscription Plans Exercise</h1>

    <div id="app">
        <!-- v-for, v-repeat -->
        <pre>@{{ $data | json }}</pre>
        <div v-for="plan in plans">
            <plan :plan="plan" :active.sync="active"></plan>
            <!-- :plan="plan" which is mean parse "plan" from parent to subject named plan -->
            <!-- :plannew="plan" this will be more clear, parse parent "plan" to subject "plannew" -->
            <!-- but if use [plan="plan"] without ':', it will read the plain text "plan" to subject "plan" variable -->
            <!-- if there was not 'sync' symbol, it will not refresh as soon as subject change it. -->
        </div>
        <h2>Here is using the inline template</h2>
        <p>The difference of css, just lazy to do that, not affect by inline template.</p>
        <div v-for="plan in plans">
            <plan2 :plan="plan" :active.sync="active" inline-template>
                <span>@{{ plan.name }}</span>
                <span>@{{ plan.price }} / month</span>
                <button @click="setActivePlan"
                        v-show="this.active !== this.plan">@{{ isUpgrade ? 'Upgrade' : 'Downgrade' }}
                </button>
                <span v-else>Current</span>
            </plan2>
        </div>
    </div>

    <template id="plan-template">
        <div>
            <pre>@{{ $data | json }}</pre>
            <span>@{{ plan.name }}</span>
            <span>@{{ plan.price }} / month</span>
            <button class="btn btn-primary"
                    v-if="this.plan.name !== this.active.name" @click="setActivePlan">
                @{{ isUpgrade ? 'Upgrade' : 'Downgrade'}}
            </button>
            <span v-else>Selected</span>
            <!-- format it? using the css, no more talk to here -->
        </div>
    </template>

    <script>
        new Vue({
            el: '#app',
            components: {
                plan: {
                    template: '#plan-template',
                    props: {
                        plan: {
                            default: function () {
                                return {
                                    name: 'default name',
                                    price: 0
                                }
                            }
                        },
                        active: {}
                    },
                    computed: {
                        isUpgrade: function () {
                            return this.plan.price > this.active.price
                        }
                    },
                    methods: {
                        setActivePlan: function () {
                            return this.active = this.plan;
                        }
                    }
                },
                plan2: {
                    props: ['plan', 'active'],
                    computed: {
                        isUpgrade: function () {
                            return this.plan.price > this.active.price
                        }
                    },
                    methods: {
                        setActivePlan: function () {
                            return this.active = this.plan;
                        }
                    }
                }
            },
            data: {
                plans: [
                    {name: 'Enterprise', price: 100},
                    {name: 'Profession', price: 50},
                    {name: 'Personal', price: 10},
                    {name: 'Free', price: 0}
                ],
                active: {}
            }
        });
    </script>
@endsection
