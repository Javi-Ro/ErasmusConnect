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
import '@mdi/font/css/materialdesignicons.css'
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import specific icons */

// Iconos de navbar
import { faCaretDown, faUser, faBars, faX, faArrowRightFromBracket} from '@fortawesome/free-solid-svg-icons'

// Iconos para publicaciones
import {faShareNodes, faEllipsisVertical} from '@fortawesome/free-solid-svg-icons';
import {faComment} from '@fortawesome/free-regular-svg-icons';
import {faCircleXmark} from '@fortawesome/free-regular-svg-icons';
import {faThumbsDown} from '@fortawesome/free-regular-svg-icons';
import {faFlag} from '@fortawesome/free-regular-svg-icons';
import {faArrowAltCircleLeft} from '@fortawesome/free-regular-svg-icons';

// Importar el mismo pero en distintos estilos (gratuitos solo está solid y regular)
import {faHeart as faHeartSolid} from '@fortawesome/free-solid-svg-icons';
import {faHeart as faHeartRegular} from '@fortawesome/free-regular-svg-icons';
// --
import {faBookmark as faBookmarkSolid} from '@fortawesome/free-solid-svg-icons';
import {faBookmark as faBookmarkRegular} from '@fortawesome/free-regular-svg-icons';

// Iconos generales
import {faArrowLeft, faPlus} from '@fortawesome/free-solid-svg-icons';
import { faUpload } from '@fortawesome/free-solid-svg-icons'

// Añadimos iconos para navbar
library.add(faCaretDown, faUser, faBars, faX, faArrowRightFromBracket)

// Añadimos iconos generales
library.add(faArrowLeft, faUpload, faPlus)

// Añadimos iconos para publicaciones
library.add(faEllipsisVertical, faHeartSolid, faHeartRegular, faBookmarkSolid, faBookmarkRegular, faShareNodes, faComment, faCircleXmark,faThumbsDown,faFlag,faArrowAltCircleLeft)


/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.use(Buefy)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


// Admin
Vue.component('reportes', require('./components/Admin/Reportes.vue').default);
Vue.component('admin-paises', require('./components/Admin/AdminPaises.vue').default);
Vue.component('admin-ciudades', require('./components/Admin/AdminCiudades.vue').default);
Vue.component('admin-etiquetas', require('./components/Admin/AdminEtiquetas.vue').default);
Vue.component('admin-posts', require('./components/Admin/Publicaciones.vue').default);
Vue.component('admin-apartments', require('./components/Admin/AdminApartments.vue').default);
Vue.component('usuarios', require('./components/Admin/Usuarios.vue').default);
//---

// Auth
Vue.component('login', require('./components/Auth/login.vue').default);
Vue.component('register-component', require('./components/Auth/RegisterComponent.vue').default);
//---

// Foro
Vue.component('vista-previa-publicacion', require('./components/Foro/VistaPreviaPublicacion.vue').default);
Vue.component('crear-publicacion', require('./components/Foro/CrearPublicacion.vue').default);
Vue.component('publicacion', require('./components/Foro/Publicacion.vue').default);
Vue.component('foro', require('./components/Foro/Main.vue').default);
Vue.component('filter-bar', require('./components/Foro/filterBar.vue').default);
Vue.component('filter-bar-horizontal', require('./components/Foro/filterBarHorizontal.vue').default);
Vue.component('right-bar', require('./components/Foro/rightBar.vue').default);
//---

// Alquileres
Vue.component('apartments', require('./components/Alquileres/Main.vue').default);
Vue.component('vista-previa-apartment', require('./components/Alquileres/Main.vue').default);
Vue.component('apartments-crear', require('./components/Alquileres/CrearApartment.vue').default);
//---

// Landing
Vue.component('landing', require('./components/Landing/landingPage.vue').default);
Vue.component('InfoCards', require('./components/Landing/InfoCards.vue').default);
//---

// Layout
Vue.component('navbar', require('./components/Layout/Navbar.vue').default);
Vue.component('footer-web', require('./components/Layout/Footer.vue').default);
Vue.component('admin-navbar', require('./components/Layout/AdminNavbar.vue').default);
//---

//TODO: delete 
//Vue.component('perfil', require('./components/Perfil.vue').default);
//---

Vue.component('alquileres-main', require('./components/Alquileres/Main.vue').default);
Vue.component('filter-bar-alquiler', require('./components/Alquileres/FilterBar.vue').default);
Vue.component('filter-bar-horizontal-alquiler', require('./components/Alquileres/FilterBarHorizontal.vue').default);
Vue.component('filter-modal', require('./components/Alquileres/FilterModal.vue').default);
Vue.component('profile', require('./components/Perfil/Profile.vue').default);
Vue.component('editar-perfil', require('./components/Perfil/editarPerfil.vue').default);


//ABOUT US
Vue.component('about-us', require('./components/aboutUs.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    data: {
        city: -1
    },
    el: '#app',
});
