/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import router from './routes'
import store from './store';
import 'vue-awesome/icons/flag'
import { Lang } from 'laravel-vue-lang';

Vue.use(Lang, {
    locale: 'message',
    fallback: document.head.querySelector('meta[name="locale"]').content,
    ignore: {
        fr: ['validation'],
    },
});
// or import all icons if you don't care about bundle size
import 'vue-awesome/icons'

/* Register component with one of 2 methods */

import Icon from 'vue-awesome/components/Icon'
import AOS from 'aos'
import 'aos/dist/aos.css'
// globally (in your main .js file)
Vue.component('v-icon', Icon)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 window.onload = function () {
    const app = new Vue({
        el: '#app',
        store,
        router,
        components: {
            'v-icon': Icon
        },
        created () {
            AOS.init()
        },
    });
}


//
