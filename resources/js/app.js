require('./bootstrap');
window.Vue = require('vue');

import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);
Vue.component('all-rooms', require('./components/AllRooms.vue').default);


const app = new Vue({
    el: '#app'    
});