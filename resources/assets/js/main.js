import Vue from "vue";
import Echo from "laravel-echo";

window._ = require("lodash");
window.Popper = require("popper.js").default;
window.io = require("socket.io-client");

// Socket.io
window.Echo = new Echo({
  broadcaster: "socket.io",
  host: window.location.hostname + ":6001",
});

try {
  window.$ = window.jQuery = require("jquery");

  require("bootstrap");
} catch (e) {}

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
  console.error(
    "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
  );
}

Vue.component("chat-component", require("./components/Chat.vue"));

new Vue({
  el: "#app-layout",
  data: {
    userID: null,
  },
  mounted() {
    this.userID = document.head.querySelector('meta[name="userID"]').content;
  },
});
