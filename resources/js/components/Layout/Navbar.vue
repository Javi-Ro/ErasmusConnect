<template>
    <!-- <b-navbar style="widht: 50%">
        <template #brand>
            <b-navbar-item tag="router-link" :to="{ path: '/' }">
                <img
                    src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png"
                    alt="Lightweight UI components for Vue.js based on Bulma"
                >
            </b-navbar-item>
        </template>
        <template #start>
            <b-navbar-item href="#">
                Home
            </b-navbar-item>
            <b-navbar-item href="#">
                Documentation
            </b-navbar-item>
            <b-navbar-dropdown label="Info">
                <b-navbar-item href="#">
                    About
                </b-navbar-item>
                <b-navbar-item href="#">
                    Contact
                </b-navbar-item>
            </b-navbar-dropdown>
        </template>

        <template #end>
            <b-navbar-item tag="div">
                <div class="buttons">
                    <a class="button is-primary">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light">
                        Log in
                    </a>
                </div>
            </b-navbar-item>
        </template>
    </b-navbar> -->
    
    <div class="navbar">
        <!-- Logo -->
        <div class="brand">
            <a class="nav-item">
                <img
                    class="brand-img"
                    src="/images/logo.png"
                    alt="Erasmus Connect"
                >
            </a>
        </div>
        <div class="menu">
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
                            role="button">
                            <span style="margin-right: 10px;">{{getSelected(selected)}}</span>
                            <font-awesome-icon icon="fa-solid fa-caret-down" />
                        </a>
                    </template>

                    <b-dropdown-item custom aria-role="listitem">
                      <b-input v-model="searchTerm" placeholder="Buscar..." expanded />
                  </b-dropdown-item>

                    <!-- <b-dropdown-item 
                    v-for="(city, index) in availableCities" :key="index"
                    @click="setSelected(index)" 
                    aria-role="listitem"
                    >
                        {{city}}
                    </b-dropdown-item> -->
                    <b-dropdown-item 
                    v-for="(city, index) in filteredData" :key="city" 
                    @click="setSelected(index)" 
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
          selected: 0,
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
            return this.availableCities[this.selected];
        },
        setSelected(option) {
            this.selected = option;
            //window.location.reload(); //TODO: Esto hara recargar página entera de filtros
        }
    },
    mounted() {}
  }
</script>
<style lang="scss" scoped>
$blue: #00309a;
$yellow: #ffcd00;
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
.dropdown-item:hover {
    color: #fff;
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
