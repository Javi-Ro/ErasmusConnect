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
                    src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png"
                    alt="Lightweight UI components for Vue.js based on Bulma"
                >
            </a>
        </div>
        <div class="menu">
            <!-- Opciones -->
            <div class="menu-start">
                <a class="nav-item start-button" href="#">
                    Home
                </a>
                <a class="nav-item start-button" href="#">
                    Documentation
                </a>
                <a class="nav-item start-button" href="#">
                    About us
                </a>
            </div>
            <!-- Login y register -->
            <div class="menu-end">
                <div class="buttons-menu-end" id="register">
                    <a class="button is-primary">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light" id="login">
                        Log in
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
          availableCities: [
              "Madrid",
              "Budapest",
              "Praga",
              "Gdansk"
          ],
          selected: 0,
          menu: [
              { name: "Foro", link: "#"},
              { name: "Renting", link: "#"},
              { name: "Chats", link: "#"},
              { name: "Eventos", link: "#"},
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
    computed: {},
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
.navbar {
    display: flex;
    flex-direction: row;
    // width: 100%;
    min-height: 3.25rem;
    justify-content: flex-start;
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
.start-button {
    // padding: 0 2% 0 2%;
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
}
#login {
    margin-left: 0.5rem;
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
