/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue'
import Buefy from 'buefy'
import 'buefy/dist/buefy.css'

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import specific icons */
import { faCaretDown } from '@fortawesome/free-solid-svg-icons'
import { faUser } from '@fortawesome/free-solid-svg-icons'
import { faBars } from '@fortawesome/free-solid-svg-icons'
import { faX } from '@fortawesome/free-solid-svg-icons'
import { faArrowRightFromBracket } from '@fortawesome/free-solid-svg-icons';

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faCaretDown)
library.add(faUser)
library.add(faBars)
library.add(faX)
library.add(faArrowRightFromBracket)
Vue.component('font-awesome-icon', FontAwesomeIcon)


Vue.use(Buefy)



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('navbar', require('./components/Layout/Navbar.vue').default);
Vue.component('footer-web', require('./components/Layout/Footer.vue').default);
Vue.component('landing', require('./components/landingPage.vue').default);
Vue.component('InfoCards', require('./components/InfoCards.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);
Vue.component('profile', require('./components/Profile.vue').default)
Vue.component('foro2', require('./components/Foro/Main.vue').default);
Vue.component('foro', require('./components/Foro/Main.vue').default);
Vue.component('vista-previa-publicacion', require('./components/Foro/VistaPreviaPublicacion.vue').default);
Vue.component('apartment', require('./components/Apartments.vue').default);
Vue.component('filter-bar', require('./components/filterBar.vue').default);
Vue.component('login', require('./components/login.vue').default);
Vue.component('admin-navbar', require('./components/Layout/AdminNavbar.vue').default);
Vue.component('reportes', require('./components/Reportes.vue').default);
Vue.component('usuarios', require('./components/Usuarios.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
