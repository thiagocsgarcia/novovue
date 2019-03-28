window.Popper = require("popper.js").default;
window.swal = require("sweetalert");

try {
    window.$ = window.jQuery = require("jquery");
    require("bootstrap");
} catch (e) {
    console.error(e);
}

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.baseURL = "http://10.171.2.18/empresas";

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js')

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// })
