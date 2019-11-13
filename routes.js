import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        components: {
            default: require('./views/home.vue'),
            secondTemplateOnSameBladePage: require('./views/homeSecondTemplate.vue')
        }
    },
    {
        path: '/create',
        component: require('./views/create.vue')
    }
];

export default new VueRouter({
    routes
});
