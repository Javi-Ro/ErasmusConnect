<template>
  <section class="login-main">
      <div class="titulo">
          <p> Iniciar sesión </p>
      </div>

      <div class="login-main-user"> 
          <input placeholder="Nombre de usuario">
      </div>
        <div class="login-main-password"> 
          <input placeholder="Contraseña" type="password">
      </div>
      <div class="pregunta"> ¿No tienes cuenta? <a class="registrate"> Regístrate </a> </div>
      <b-button class="button is-primary" id="login">Iniciar sesión</b-button>

  </section>
</template>

<style lang="scss" scoped>

    .titulo{
        color:#00309a;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .pregunta{
        margin-bottom: 10px;
    }
    .registrate{
        color:#00309a;
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