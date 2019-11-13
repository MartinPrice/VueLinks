
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import router from './routes';

new Vue({
    el: '#app',
    router: router,
    data: {
        name: '',
        description: ''
    },
    methods: {
        onSubmit() {
            axios.post('/visits/createVisit', this.$data);
        }
    }
});

import router2 from './routes2';

new Vue({
    el: '#app2',
    router: router2,
});
