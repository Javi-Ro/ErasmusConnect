<template>
    <div class="navbar">
        <!-- Logo -->
        <div class="brand">
            <a class="nav-item" tag="router-link" href="/">
                <img
                    class="brand-img"
                    src="/images/logo/logo.png"
                    alt="Erasmus Connect"
                >
            </a>
            <!-- Botón para desplegar el menú, aparece cuando desaparece el menú -->
            <a class="navurguesa" @click="openMenu()" id="navurguesa">
                <font-awesome-icon id="openIcon" icon="fa-solid fa-bars" style="width:30px; height:30px"/>
                <font-awesome-icon id="closeIcon" icon="fa-solid fa-x" style="width:30px; height:30px"/>
            </a>
        </div>
        <div class="menu" id="menu">
            <!-- Utilidades -->
            <div class="menu-start">
                <b-dropdown append-to-body aria-role="menu" scrollable max-height="200" trap-focus>
                    <template #trigger>
                        <a class="navbar-item" role="button" style="padding-left: 20px;">
                            <span style="margin-right: 10px;">{{selectedCity}}</span>
                            <font-awesome-icon icon="fa-solid fa-caret-down" />
                        </a>
                    </template>

                    <b-dropdown-item custom aria-role="listitem">
                        <input type="text" v-model="searchTerm" autocomplete="on" id="buscador" placeholder="Buscar..." class="input">
                        <!-- <b-input id="buscador" v-model="searchTerm" placeholder="Buscar..." expanded /> -->
                    </b-dropdown-item>
                    <!-- Se le pasa la ciudad debido a un bug relacionado con usar index (más explicado abajo) -->
                    <b-dropdown-item 
                    v-for="city in filteredData" :key="city[1]" 
                    @click="setSelected(city[1])"
                    aria-role="listitem">
                        {{city[0]}}
                    </b-dropdown-item>
                </b-dropdown>
                <!-- <b-navbar-dropdown :label="getSelected(selected)">
                    <b-navbar-item v-for="(city, index) in availableCities" :key="index" @click="setSelected(index)" href="#">
                        {{city}}
                    </b-navbar-item>
                </b-navbar-dropdown> -->
                <!-- <b-navbar-item v-for="(option,index) in menu" :key="index" :href="option.link">
                    {{option.name}}
                </b-navbar-item> -->
                <a class="nav-item btn-start" 
                v-for="(option,index) in publicMenu" :key="index" :href="option.link"
                >
                    {{option.name}}
                </a>
                <!-- <a class="nav-item btn-start" href="#">
                    Foro
                </a>
                <a class="nav-item btn-start" href="#">
                    Alquileres
                </a>
                <a class="nav-item btn-start" href="#">
                    Eventos
                </a>
                <a class="nav-item btn-start" href="#">
                    Sobre nosotros
                </a> -->
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
                            <div style="width: 48px;height: 48px; margin-right: 15px;">
                                <img :src="profileImage" style="object-fit: cover; height: 48px; border-radius: 50%;border:2px solid #00309a"/>
                            </div>
                            <span style="margin-right: 10px;">{{user.nickname}}</span>
                            <font-awesome-icon icon="fa-solid fa-caret-down" />
                        </a>
                    </template>

                    <b-dropdown-item @click="showProfile()"><font-awesome-icon icon="fa-solid fa-user" style="margin-right: 10px;"/>Perfil</b-dropdown-item>
                    <b-dropdown-item @click="logout()"><font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket" style="margin-right: 10px;"/>Salir
                    </b-dropdown-item>
                </b-dropdown>
            </div>
            </div>
            <!-- Login y register -->   
            <div v-else class="menu-end">
                <div class="buttons-menu-end">
                    <a href="/register" class="button is-primary" id="register">
                        <strong>Registrarse</strong>
                    </a>
                    <a href="/login" class="button is-light" id="login">
                        Iniciar sesión
                    </a>
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
                { name: "Foro", link: "/foro"},
                { name: "Alquileres", link: "#"},
                { name: "Eventos", link: "#"},
                //   { name: "Chats", link: "#"}, Esto en la vista privada
                { name: "Versión: 1.0.0", link: "#"},
            ]
      }
    },
    watch: {
      data: {
            immediate: true,
            deep: true,
            handler(val, oldVal) {
            //do something
            }
        },
    },
    computed: {
        // Sirve para filtrar una ciudad entre todas las que tenemos
        filteredData() {
            this.availableCitiesNames = this.availableCities.map((item) => [item.name, item.id]);
            return this.availableCitiesNames.filter((item) => item[0].toLowerCase().indexOf(this.searchTerm.toLowerCase()) >= 0);
        },
        resizeNavbar() {
            var width = window.innerWidth; 
            console.log(width);
        }
    },
    methods: {
        getCities() {
            axios.get(`/api/cities`)
                .then(response => {
                    this.availableCities = response.data.cities;
                }).catch(error => {
                    console.info(error)
                });
        },
        showProfile() {
            window.location.href = "/" + this.user.nickname + "/profile";
        },
        getSelected(selected) {
                axios.post(`/api/get_city_by_id`, {
                    id: selected
                })
                    .then(response => {
                        this.selected = response.data.city.id; // ID de la clase seleccionada
                        this.selectedCity = response.data.city.name;
                    }).catch(error => {
                        console.info(error)
                    });
        },
        setSelected(option) {
            this.getSelected(option)
            //window.location.reload(); //TODO: Esto hara recargar página entera de filtros
        },
        openMenu() {
            var menu = document.getElementById("menu");
            var open = document.getElementById("openIcon");
            var close = document.getElementById("closeIcon");
            // Cerrar menú
            console.log(menu.classList.value)
            if (menu.classList.value != "menu") {
                // menu.style.display = "none";
                menu.classList.remove("is-active");
                open.style.display = "flex";
                close.style.display = "none";
            }
            // Abrir menú 
            else {
                menu.classList.add("is-active");
                // menu.style.display = "block";
                open.style.display = "none";
                close.style.display = "flex";
            }
        },
        getUser() {
            axios.get(`/api/auth`).then(response => {
                this.user = response.data.user;
                this.auth = response.data.auth;
                if (this.auth)
                    this.profileImage = '/storage/images/users/' + this.user.img_url;
            }).catch(error => {
                console.info(error);
            });
        },
        logout() {
            axios.post(`/logout`).then(response => {
                this.getUser();
                window.location.href = "/";
            }).catch(error => {
                console.info(error);
            });
            
        }
    },
    mounted() {
        this.getUser();
    },
    created() {
        this.getCities();
    }
  }
</script>
<style lang="scss" scoped>
$blue: #00309a;
$yellow: #F2AF13;
#closeIcon {
    display: none;
}    /* Modifica el texto de dentro */
.navbar {
    position: fixed !important;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    min-height: 3.25rem;
    justify-content: flex-start;
    background-color: whitesmoke;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
.menu {
    display: flex;
    align-items: center;
    // justify-content: space-around;
    flex-grow: 1;
}
.nav-item {
    display: flex;
    align-items: center;
    flex-grow: 0;
    flex-shrink: 0;
    padding: 0.5rem 0.75rem 0.75rem 0.75rem;
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
}
.brand-img {
    max-height: 3.25rem;
}
// botones de navegación
.menu-start {
    display: flex;
    justify-content: flex-start;
    margin-right: auto;
}
.btn-start {
    margin: 0 0.5rem 0 0.5rem;
}
// Botones de iniciar sesión y registrarse
.menu-end {
    display: flex;
    justify-content: flex-end;
    margin-left: auto;
}
.buttons-menu-end {
    display: flex;
}
#register {
    margin-right: 0.5rem;
    background-color: $blue;
    color: white;
}
#register:hover {
    margin-right: 0.5rem;
    // background-color: darken($blue, 10%);
    color: $yellow;
}
#login {
    margin-left: 0.5rem;
}
// Para modificar el dropdown de ciudades
.navbar-item {
    color: $blue;
}
a.navbar-item:hover {
    background-color: transparent;
}
.dropdown-item:active {
    background-color: transparent;
}
// Para cambiarle el borde a los input text
.input:focus{
    border-color: $blue !important;
    -webkit-box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
    box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
}
// -------------------------------------------------------------
// Collapse navbar
// -------------------------------------------------------------
.navurguesa {
    display: none;   
}
.menu.is-active {
    display: flex;
    flex-direction: row;
}
@media screen and (max-width: 1074px) {
    .menu.is-active {
        display: block;
        flex-direction: column;
        z-index: 99;
    }
    .navbar {
        flex-wrap: wrap;
        width: 100%;
    }
    .menu {
        display: none;
    }
    .brand {
        justify-content: space-between;
        width: 100%;
    }
    .navurguesa {
        color: #4a4a4a;
        cursor: pointer;
        justify-content: center;
        align-items: center;
        display: flex;
        position: relative;
        margin-left: auto;
    }
    .menu-start {
        justify-content: flex-start;
        flex-direction: column;
        margin-right: none;
    }
    // Botones de iniciar sesión y registrarse
    .menu-end {
        justify-content: flex-start;
        margin: 0 0.5rem 0 0.5rem;
        padding: 0.5rem 0.75rem 0.75rem 0.75rem;
    }
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
</style>