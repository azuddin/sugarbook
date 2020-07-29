require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat-application', require('./components/ChatApplication.vue'));

const app = new Vue({
    el: '#app',
    data: {
        userID: null
    },
    mounted () {
        // Assign the ID from meta tag for future use in application
        this.userID = document.head.querySelector('meta[name="userID"]').content
    }
});

