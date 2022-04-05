<template>
    <section class="login-main">
        <div class="titulo-pagina">
            USUARIOS
        </div>

        <b-table :paginated=true 
            :paginationPosition='bottom'
            :per-page='10'
            :pagination-simple='true'
            :paginationOrder= 'is-centered'
            :sortIcon='arrow-up'
            :sortIconSize='is-small'
             aria-next-label="Next page"
            aria-previous-label="Previous page"
            aria-page-label="Page"
            aria-current-label="Current page"
            :defaultSortDirection= 'asc'
            :data="data"
            :columns="columns"
            >
        </b-table>
        <div class="top">
            <a> 
              <b-button type="is-info" >Añadir usuario</b-button>
            </a>
        </div>
  

  </section>
</template>
<style>
.table{
  background-color: #f8fafc;
}
</style>
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
        display:flex;
        flex-flow: wrap;
        justify-content: center;
    }

    .button{
      margin: 20px 0 0 0px;
      width: 100%;

    }

    a{
      width: 500px;
     
    }

    .titulo{
        color:#00309a;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .login-main{
        margin-left: 300px;
        height: 100vh;  
        background-color: #f8fafc;
    }

    .titulo{
        margin-bottom: 20px;
    }


</style>

 <script>
    export default {
      props: {},
        data() {
            return {
                data: [
                    { 'id': 1, 'nickname': '@rosa9120', 'email': 'rmrl3@alu.ua.es', 'date': '2016-10-15 13:43:27', 'followers': '152' },
                    { 'id': 2, 'nickname': '@ilyaan_', 'email': 'isd@alu.ua.es', 'date': '2016-12-15 06:00:53', 'followers': '325' },
                    { 'id': 3, 'nickname': '@adriberenguer', 'email': 'aba@gmail.com', 'date': '2016-04-26 06:26:28', 'followers': '1204' },
                    { 'id': 4, 'nickname': '@javiro', 'email': 'javi@gmail.com', 'date': '2016-04-10 10:28:46', 'followers': '25' },
                    { 'id': 5, 'nickname': '@raul33', 'email': 'raultaes@alu.ua.es', 'date': '2016-12-06 14:38:38', 'followers': '78' }
                ],
                columns: [
                    {
                        field: 'id',
                        label: 'ID',
                        width: '100',
                        numeric: true,
                        searchable: true,
                    },
                    {
                        field: 'nickname',
                        label: 'Nombre de usuario',
                        searchable: true,
                        
                    },
                    {
                        field: 'email',
                        label: 'Correo electrónico',
                        searchable: true,
                    },
                    {
                        field: 'followers',
                        label: 'Seguidores',
                        width: '200',
                        sortable:true,
                        centered: true
                    },
                    {
                        field: 'date',
                        label: 'Fecha de creación',
                        sortable:true,
                        centered: true
                    },

                ]
            }
        }
    }
</script>