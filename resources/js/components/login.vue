<template>
  <section class="login-main">
      <div class="titulo">
          <p> Iniciar sesión </p>
      </div>

      <div class="login-main-user"> 
          <input placeholder="Nombre de usuario">
      </div>
            <div class="login-main-password"> 
          <input placeholder="Contraseña">
      </div>
      <b-checkbox id="checkbox" > He olvidado mi contraseña </b-checkbox>
      <b-button class="button is-primary" id="login">Iniciar sesión</b-button>

  </section>
</template>

<style lang="scss" scoped>

    .titulo{
        color:#00309a;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .login-main{
        margin-top: 130px;
        display:flex;
        flex-flow: column wrap;
        align-items: center;
        height: 100%;
    }

    .titulo{
        margin-bottom: 20px;
    }

    .login-main-user{
        margin-bottom: 20px;
    }

    .login-main-password{
        margin-bottom: 20px;
    }

    #login {
        margin-right: 0.5rem;
        background-color: #00309a;
        color: white;
    }
    #login:hover {
        margin-right: 0.5rem;
        // background-color: darken($blue, 10%);
        color: #ffcd00;
    }

    .checkbox{
        font-size: 15px;
        font-family: Arial, Helvetica, sans-serif;
        margin-bottom: 10px;
    }

</style>

<script>
  export default {
    props: {},
    data() {
      return {}
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
    methods: {},
    mounted() {}
  }
</script>