<template>
    <b-navbar class="navbar-container">
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
    </b-navbar>
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
