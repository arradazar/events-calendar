require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

// For date formatting
Vue.use(require('vue-moment'));

// Displaying toast plugin 
import Toasted from 'vue-toasted';
Vue.use(Toasted)

import App from './App.vue';

const router = new VueRouter({
    mode: 'history'
})
  
const app = new Vue({
    el: '#app',
    components: {
        App
    },
    render: h => h(App)
});

// const router = new VueRouter({ mode: 'history', routes: routes});
// const app = new Vue(Vue.util.extend({ router })).$mount('#app');