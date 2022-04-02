<template>
    <section class="login-main">
        <div class="titulo-pagina">
            USUARIOS
        </div>
        <div class="top">
            <h3>Usuarios totales: </h3>
            <div class="form-group has-search search">
                <form class="search-form">
                    <input type="text" name="search" class="form-control" placeholder="Busca por nombre de usuario">
                    <!-- <input type="submit" class="btn btn-primary" value="Busca"/> -->
                    <b-button type="is-info"> Busca </b-button>
                </form>
            </div>
            <a> 
              <b-button type="is-info" >Añadir usuario</b-button>
            </a>
        </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nickname</th>
            <th scope="col">Email</th>
            <th scope="col">Posts</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>

  </section>
</template>

<style lang="scss" scoped>

    .titulo-pagina{
          justify-content: center;
          display: flex;
          margin-top: 20px;
          font-size: x-large;
          color:#00309a;
          font-family: sans-serif;
    }

    .top{
        margin:10px 0px 20px 0px;
        display:flex;
        flex-flow: wrap;
        justify-content: space-between;
    }

    .search-form{
      width: 100%;
      display:flex;
    }

    // .btn-primary{
    //   background-color: #00309a;
    //   border-color: #00309a;
    // }

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
        margin-left: 300px;
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