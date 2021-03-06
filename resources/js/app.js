/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

//Mixin
Vue.mixin({
    methods: {
        route,
        getImage(name) {
            return "/uploads/products/" + name;
        },
    }
});

//Vform axios
import {Form, HasError, AlertError} from 'vform';

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);

//Vue progress-bar
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
});

//Sweet-alert
import Swal from 'sweetalert2';

window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;

//For event
window.Fire = new Vue();

//Vue router
import VueRouter from "vue-router"

Vue.use(VueRouter);

let routes = [
    {path: '/dashboard', component: require("./components/Dashboard").default},
    {path: '/profile', component: require("./components/Profile").default},
    {path: '/users', component: require("./components/Users").default},
    {path: '/products', component: require("./components/Products").default},
    {path: '/category', component: require("./components/Category").default},
    {path: '/tag', component: require("./components/Tag").default},
    {path: '/messages', component: require("./components/Messages").default},
    {path: '/messages-list', component: require("./components/MessageContact").default},
    {path: '/message', component: require("./components/Message").default},
    {path: '/discount', component: require("./components/Discount").default},
    {path: '/orders', component: require("./components/Order").default},
    {path: '/all-orders', component: require("./components/Orders").default},
    {path: '/producer-orders', component: require("./components/OrdersP").default},
    {path: '/raiting', component: require("./components/Raitings").default},
];

const router = new VueRouter({
    mode: 'history',
    routes
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
    router
});
