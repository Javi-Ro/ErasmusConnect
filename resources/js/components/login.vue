
<template>
  <section class="login-main">
    <div class="contenedor">
      <div class="titulo">
          <p> Iniciar sesión </p>
      </div>

      <form action="" v-on:submit.prevent="loginUser()" method="get">
        <input type="hidden" name="_token" :value="csrf">
        <div class="login-main-user"> 
            <input v-model="nickname" name="nickname" placeholder="Nombre de usuario" required>
        </div>
          <div class="login-main-password"> 
            <input v-model="password" name="password" placeholder="Contraseña" type="password" required>
        </div>
        <div class="pregunta"> ¿No tienes cuenta? <a class="registrate"> Regístrate </a> </div>
        <b-button native-type="submit" class="button is-primary" id="login">Inicia sesión</b-button>
      </form>

  <div class="elemento"> 
          <b-input placeholder="Nombre de usuario"> </b-input>
      </div>
      <div class="elemento"> 
        <b-input class="input-buefy"
               placeholder="Contraseña" type="password" password-reveal> 
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

<style>
    .input:focus{
      border-color: #00309a !important;
      -webkit-box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
      box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
    }
</style>


<style lang="scss" scoped>

  // html,body{
  //   height: 100vh;
  // }
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
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        height: calc(100vh - 130px);
        flex-wrap: nowrap;
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
      return {
        nickname: '',
        password: '',
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
      loginUser() {
        axios.post(`/login`, {
          nickname: this.nickname,
          password: this.password
        }).then(response => {
          if (response.data.success) {
            window.location.href = "/";
          } else {
            alert("These credentials does not match any of our records!");
          }
        }).catch(error => {
          console.info(error.response.data);
        });
      }
    },
    mounted() {}
  }

</script>