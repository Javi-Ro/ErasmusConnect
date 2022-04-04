<template>
  <section class="login-main">
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