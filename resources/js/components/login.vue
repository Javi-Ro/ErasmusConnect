
<template>
  <section class="login-main">
    <div class="contenedor">
      <div class="titulo">
          <p> Iniciar sesión </p>
      </div>

      <div class="elemento"> 
          <b-input v-model="nickname" placeholder="Nombre de usuario"> </b-input>
      </div>
      <div class="elemento"> 
        <b-input v-model="password" class="input-buefy" icon-pack="fas"
              icon-right="faEye" placeholder="Contraseña" type="password" password-reveal> 
        </b-input>
      </div>

      <div class="pregunta"> 
        <p> ¿No tienes cuenta? <a class="registrate" href="/register"> Regístrate </a> </p>
      </div>
        <b-button v-on:click="loginUser()" class="button login is-primary" id="login">Iniciar sesión</b-button>
      
    </div>

    <div>
      <footer-web></footer-web>
    </div>
  </section>

</template>

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