require('./bootstrap');

window.Vue = require('vue');

Vue.component('cases-user', require('./components/cases-user.vue').default);

const app = new Vue({
    el: '#app',
});

