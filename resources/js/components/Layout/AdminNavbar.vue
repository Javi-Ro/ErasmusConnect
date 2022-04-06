<template>
    <div class="navbar">
        <!-- Logo -->
        <div class="brand" style="align-items: center">
            <p>ADMINISTRADOR</p>
            <a class="nav-item" tag="router-link" href="/admin/reports">
                <img
                    class="brand-img"
                    src="/images/logo.png"
                    alt="Erasmus Connect"
                >
            </a>
        </div>
        <div class="menu" id="menu">
            <!-- Utilidades -->
            <div class="menu-start">
                <a class="nav-item btn-start" 
                v-for="(option,index) in publicMenu" :key="index" :href="option.link"
                >
                    {{option.name}}
                </a>
            </div>
            <!-- Usuario ya registrado -->
            <div v-if="auth">
                <div class="menu-start">
                <b-dropdown
                    append-to-body
                    aria-role="menu"
                    scrollable
                    max-height="200"
                    trap-focus
                >
                    <template #trigger>
                        <a
                            class="navbar-item-logged"
                            role="button"
                            style="padding-left: 20px;"
                            >
                            <img :src="profileImage" height="40px" width="40px" style="margin-right:10px;border-radius:50%;border:2px solid #00309a" />
                            <span style="margin-right: 10px;">{{user.nickname}}</span>
                            <font-awesome-icon icon="fa-solid fa-caret-down" />
                        </a>
                    </template>

                    <b-dropdown-item><font-awesome-icon icon="fa-solid fa-user" style="margin-right: 10px;"/>Perfil</b-dropdown-item>
                    <b-dropdown-item @click="logout()"><font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket" style="margin-right: 10px;"/>Salir
                    </b-dropdown-item>
                </b-dropdown>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    props: {},
    data() {
      return {
            user: null,
            auth: false,
            profileImage: '',
            searchTerm: '', // Para buscar una ciudad
            availableCities: [],
            availableCitiesNames: [],
            // Ahora se almacena directamente el nombre de la ciudad, el index daba problemas con la lista filtrada
            // Se cambiaba el index porque se cambiaba el tamaño de la lista
            selected: 1,
            selectedCity: 'Ciudad',
            // Nombre cambiado
            publicMenu: [
                { name: "Reportes", link: "/admin/reports"},
                { name: "Usuarios", link: "#"},
                { name: "Publicaciones", link: "/admin/posts"},
                { name: "Alquileres", link: "#"},
                { name: "Etiquetas", link: "#"},
                { name: "Ciudades", link: "#"},
                { name: "Paises", link: "#"}
            ]
      }
    },
    methods: {
    },
    mounted() {
        // this.getUser();
    },
    created() {
    }
  }
</script>
<style lang="scss" scoped>
$blue: #00309a;
$yellow: #ffcd00;
.navbar {
    height: 100%;
    max-width: 280px;
    min-width: 280px;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    min-height: 3.25rem;
    justify-content: flex-start;
    background-color: whitesmoke;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    position: fixed !important;
    padding: 30px 30px 30px 30px;
}
.menu {
    display: flex;
    align-items: center;
    flex-direction: column;
    // justify-content: space-around;
    flex-grow: 1;
}
.nav-item {
    display: flex;
    align-items: center;
    flex-grow: 0;
    flex-shrink: 0;
    padding: 0.75rem 0 0.75rem 0;
    color: $blue;
}
.navbar-item-logged {
    display: flex;
    justify-content: center;
    align-items: center;
    flex: 0 auto;
    color: $blue;
}
// Foto de la marca
.brand {
    display: flex;
    flex-direction: column;
}
.brand-img {
    max-height: 3.25rem;
}
// botones de navegación
.menu-start {
    display: flex;
    justify-content: flex-start;
    // margin-right: auto;
    flex-direction: column;
}
.btn-start {
    margin: 0 0.5rem 0 0.5rem;
}
//-----------------------------
// Hover de los botones del menú
//-----------------------------
.btn-start {
  display: block;
  padding: 15px;
  text-decoration: none;
  color: #00309a;
}
.btn-start,
.btn-start:after,
.btn-start:before {
  transition: all .5s;
}
.btn-start:hover {
  color: #555;
}


.btn-start {
  position: relative;
}
.btn-start:after {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  width: 0%;
  content: '.';
  color: transparent;
  background: #aaa;
  height: 1px;
}

.btn-start {
  transition: all 2s;
}

.btn-start:after {
  text-align: left;
  content: '.';
  margin: 0;
  opacity: 0;
}
.btn-start:hover {
  color: #fff;
  z-index: 1;
}
.btn-start:hover:after {
  z-index: -10;
  animation: fill 1s forwards;
  -webkit-animation: fill 1s forwards;
  -moz-animation: fill 1s forwards;
  opacity: 1;
}

/* SHIFT */
nav.shift ul li a {
  position:relative;
  z-index: 1;
}
nav.shift ul li a:hover {
  color: #00309a;
}
nav.shift ul li a:after {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  margin: auto;
  width: 100%;
  height: 1px;
  content: '.';
  color: transparent;
  background: #00309a;
  visibility: none;
  opacity: 0;
  z-index: -1;
}
nav.shift ul li a:hover:after {
  opacity: 1;
  visibility: visible;
  height: 100%;
}

/* Keyframes */
@-webkit-keyframes fill {
  0% {
    width: 0%;
    height: 1px;
  }
  50% {
    width: 100%;
    height: 1px;
  }
  100% {
    width: 100%;
    height: 100%;
    background: #00309a;
  }
}

@media screen and (max-width: 425px) {
  .navbar {
    max-width: 180px;
    min-width: 180px;
  }
}
</style>