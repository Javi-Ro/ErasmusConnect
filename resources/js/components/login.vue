
<template>
  <section class="login-main">
    <div class="contenedor">
      <div class="titulo">
          <p> Iniciar sesión </p>
      </div>

      <div class="elemento"> 
          <b-input placeholder="Correo electrónico"> </b-input>
      </div>
      <div class="elemento"> 
        <b-input class="input-buefy" icon-pack="fas"
              icon-right="faEye" placeholder="Contraseña" type="password" password-reveal> 
        </b-input>
      </div>

      <div class="pregunta"> 
        <p> ¿No tienes cuenta? <a class="registrate" href="/register"> Regístrate </a> </p>
      </div>
        <b-button class="button login is-primary" id="login">Iniciar sesión</b-button>
      
    </div>

    <div>
      <footer-web></footer-web>
    </div>
  </section>

</template>

<style lang="scss" scoped>

    .titulo{
        color:#00309a;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
        align-self: center;
        margin-bottom: 10px;
    }

    .contenedor{
      display:flex;
      flex-flow: column wrap;
    }

    .pregunta{
        margin-bottom: 10px;
        align-self:center;
    }

    .registrate{
        color:#00309a;
    }

    .login-main{
        margin-top: 130px;
        display:flex;
        flex-flow: column wrap;
        justify-content: space-between;
        align-items: center;
        height: calc(100vh - 130px);
    }

    .elemento{
        margin-bottom: 20px;
    }

    .login {
        margin-right: 0.5rem;
        background-color: #00309a;
        color: white;
        align-self: center;
    }
    .login:hover {
        margin-right: 0.5rem;
        background-color: #00309a;;
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