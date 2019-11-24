require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('../../js/components/ExampleComponent.vue').default);

import Alert from './components/Alert.vue';
import Alert2 from './components/Alert2.vue';
import Alert3 from './components/Alert3.vue';

const app = new Vue({
    el: '#app',
    components: {
        Alert, Alert2, Alert3
    },
    ready() {
        alert('ready to go.');
    }
});
