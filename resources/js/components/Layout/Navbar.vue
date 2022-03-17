<template>
    <div class="navbar">
        <!-- Logo -->
        <div class="brand">
            <a class="nav-item" tag="router-link" :to="{ path: '/' }">
                <img
                    class="brand-img"
                    src="/images/logo.png"
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
                <b-dropdown
                    append-to-body
                    aria-role="menu"
                    scrollable
                    max-height="200"
                    trap-focus
                >
                    <template #trigger>
                        <a
                            class="navbar-item"
                            role="button"
                            style="padding-left: 20px;"
                            >
                            <span style="margin-right: 10px;">{{getSelected(selected)}}</span>
                            <font-awesome-icon icon="fa-solid fa-caret-down" />
                        </a>
                    </template>

                    <b-dropdown-item custom aria-role="listitem">
                        <input type="text" v-model="searchTerm" autocomplete="on" id="buscador" placeholder="Buscar..." class="input">
                        <!-- <b-input id="buscador" v-model="searchTerm" placeholder="Buscar..." expanded /> -->
                    </b-dropdown-item>
                    <!-- Se le pasa la ciudad debido a un bug relacionado con usar index (más explicado abajo) -->
                    <b-dropdown-item 
                    v-for="city in filteredData" :key="city" 
                    @click="setSelected(city)" 
                    aria-role="listitem">
                        {{city}}
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
            <!-- Login y register -->
            <div class="menu-end">
                <div class="buttons-menu-end">
                    <a class="button is-primary" id="register">
                        <strong>Registrarse</strong>
                    </a>
                    <a class="button is-light" id="login">
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
            searchTerm: '', // Para buscar una ciudad
            availableCities: [
                "Madrid",
                "Budapest",
                "Praga",
                "Gdansk"
            ],
            // Ahora se almacena directamente el nombre de la ciudad, el index daba problemas con la lista filtrada
            // Se cambiaba el index porque se cambiaba el tamaño de la lista
            selected: "Madrid",
            // Nombre cambiado
            publicMenu: [
                { name: "Foro", link: "#"},
                { name: "Alquileres", link: "#"},
                { name: "Eventos", link: "#"},
                //   { name: "Chats", link: "#"}, Esto en la vista privada
                { name: "Sobre nosotros", link: "#"},
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
            return this.availableCities.filter((item) => item.toLowerCase().indexOf(this.searchTerm.toLowerCase()) >= 0);
        }
    },
    methods: {
        getSelected() {
            // Directamente devolvemos el seleccionado
            return this.selected;
        },
        setSelected(option) {
            this.selected = option;
            //window.location.reload(); //TODO: Esto hara recargar página entera de filtros
        },
        openMenu() {
            var menu = document.getElementById("menu");
            var open = document.getElementById("openIcon");
            var close = document.getElementById("closeIcon");
            // Cerrar menú
            if (menu.style.display === "block") {
                menu.style.display = "none";
                open.style.display = "flex";
                close.style.display = "none";
            }
            // Abrir menú 
            else {
                menu.style.display = "block";
                open.style.display = "none";
                close.style.display = "flex";
            }
        }
    },
    mounted() {}
  }
</script>
<style lang="scss" scoped>
$blue: #00309a;
$yellow: #ffcd00;
#closeIcon {
    display: none;
}
.navbar {
    display: flex;
    flex-direction: row;
    // width: 100%;
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
@media screen and (max-width: 1074px) {
    .menu {
        display: none;
        flex-direction: column;
        padding: 10px 35px !important;
    }
    .brand {
        justify-content: space-between;
        width: 100%;
        padding: 10px 35px !important;
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
</style>




    <!-- <b-navbar class="navbar-container">
        <template #brand>
            <b-navbar-item tag="router-link" :to="{ path: '/' }">
                <img class="img-container"
                    src="images/logo2.png"
                    alt="ErasmusConnect Logo"
                >
            </b-navbar-item>
        </template>
        <template #start>
            <b-navbar-dropdown :label="getSelected(selected)">
                <b-navbar-item v-for="(city, index) in availableCities" :key="index" @click="setSelected(index)" href="#">
                    {{city}}
                </b-navbar-item>
            </b-navbar-dropdown>
            <b-navbar-item v-for="(option,index) in menu" :key="index" :href="option.link">
                {{option.name}}
            </b-navbar-item>
        </template>

        <template #end>
            <b-navbar-item tag="div">
                <div class="buttons">
                    <a class="button is-primario">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light">
                        Log in
                    </a>
                </div>
            </b-navbar-item>
        </template>
    </b-navbar> -->
