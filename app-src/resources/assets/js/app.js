/**
 * Follow the default setting...
 */
require('../../js/bootstrap');
window.Vue = require('vue');

/**
 * above are code in are copied from:
 * Learning Vue 1.0: Step By Step / Episode 13 Vue and Laravel Workflow
 */
// This seems no more need.
// var Vue = require('vue');

Vue.use(require('vue-resource'));

// This is declare in default
const app = new Vue({
    el: '#app',
    // above are copied
    data: {
        currentView: 'checkout-view'
    },
    components: {
        'checkout-view': require('./views/checkout')
    }
});
