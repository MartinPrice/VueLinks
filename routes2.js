import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        components: {
            //default: require('./views/home2.vue'),
            secondComponentTemplateApp2: require('./views/home2.vue')
        }
    },
    {
        path: '/create',
        component: require('./views/create2.vue'),
    },
];

export default new VueRouter({
    routes
});
