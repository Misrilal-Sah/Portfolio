/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';

Vue.use(VueRouter);

// Set up axios with CSRF token
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
Vue.prototype.$http = axios;

// Components
import App from './components/App.vue';
import NetflixTitle from './components/NetflixTitle.vue';

// Pages
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Projects from './pages/Projects.vue';
import Experience from './pages/Experience.vue';
import Contact from './pages/Contact.vue';
import Browse from './pages/Browse.vue';
import Skills from './pages/Skills.vue';
import ProfileHome from './pages/ProfileHome.vue';
import Certifications from './pages/Certifications.vue';

// Configure router
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/browse',
            name: 'browse',
            component: Browse
        },
        {
            path: '/profile/:type',
            name: 'profile-home',
            component: ProfileHome
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/projects',
            name: 'projects',
            component: Projects
        },
        {
            path: '/experience',
            name: 'experience',
            component: Experience
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact
        },
        {
            path: '/skills',
            name: 'skills',
            component: Skills
        },
        {
            path: '/certifications',
            name: 'certifications',
            component: Certifications
        }
    ]
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    components: { App },
    render: h => h(App)
});
