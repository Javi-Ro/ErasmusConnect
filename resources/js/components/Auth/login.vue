
<template>
  <section class="login-main" id="login">
    <div class="contenedor">
      <div class="titulo">
          <p> Iniciar sesión </p>
      </div>

      <div class="elemento"> 
          <b-field size="is-medium" label="Nombre de usuario">
            <b-input
            v-model="nickname" 
            size="is-medium"
            placeholder="Nombre de usuario"> </b-input>
          </b-field>
      </div>

      <div class="elemento"> 
        <!-- <b-input v-model="password" class="input-buefy" icon-pack="fas" icon-right="faEye" placeholder="Contraseña" type="password" password-reveal> </b-input> -->
          <b-field size="is-medium" label="Contraseña">
            <b-input type="password"
              size="is-medium"
              v-model="password"
              password-reveal>
            </b-input>
        </b-field>
      </div>

      <div class="pregunta"> 
        <p> ¿No tienes cuenta? <a class="registrate" href="/register"> Regístrate </a> </p>
      </div>

      <b-button v-on:click="loginUser()" 
      class="button login is-primary" 
      id="login"
      size="is-large"
      >
        Iniciar sesión
      </b-button>
      
    </div>

    <div>
      <footer-web></footer-web>
    </div>
  </section>

</template>

<style>
  .mdi-eye {
    color: #00309a;
  } */
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
        font-size: 30px;
        font-family: Arial, Helvetica, sans-serif;
        align-self: center;
        margin-bottom: 20px;
    }

    .contenedor{
      display:flex;
      flex-flow: column wrap;
    }

    .pregunta{
        margin-bottom: 10px;
        align-self:center;
        font-size: large;
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
        margin-top: 30px;
        margin-right: 0.5rem;
        background-color: #00309a;
        color: white;
        align-self: center;
    }
    .login:hover {
        margin-right: 0.5rem;
        background-color: #00309a;;
        color: #F2AF13;
    }

</style>

<script>
  export default {
    props: {},
    data() {
      return {
        nickname: '',
        password: '',
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        getVars: {
          redirectTo: "/"
        }
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
          password: this.password,
          redirectTo: this.getVars["redirectTo"]
        }).then(response => {
          if (response.data.success) {
            window.location.href = response.data.redirectTo;
          } else {
            alert("These credentials does not match any of our records!");
          }
        }).catch(error => {
          console.info(error.response.data);
        });
      }
    },
    mounted() {},
    created() {
      let uri = window.location.href.split('?');
      if(uri.length == 2) {
        let vars = uri[1].split('&');
        let tmp = '';
        let getVarsAux = {};
        vars.forEach(function(variable) {
          tmp = variable.split('=');
          if(tmp.length == 2)
            getVarsAux[tmp[0]] = tmp[1];
        });
        this.getVars = getVarsAux;
      }
    }
  }

</script>