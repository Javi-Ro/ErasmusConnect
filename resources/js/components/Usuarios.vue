<template>
    <section class="login-main">
        <div class="titulo-pagina">
            USUARIOS
        </div>
<b-table class="table"
            :data="data"
            :debounce-search="1000">

                <b-table-column field="id" label="ID" numeric width="10%" sortable searchable centered v-slot="props">
                    {{ props.row.id }}
                </b-table-column>
                <b-table-column field="nickname" label="Nombre de usuario" width="20%" style="margin-left: 20px;" centered sortable searchable v-slot="props">
                    {{ props.row.nickname }}
                </b-table-column>
                <b-table-column field="email" label="Correo electrónico" width="20%" style="margin-left: 20px;" centered sortable searchable v-slot="props">
                    {{ props.row.email }}
                </b-table-column>
                <b-table-column field="date" label="Fecha de unión" width="20%" style="margin-left: 20px;" sortable v-slot="props">
                    {{ props.row.date }}
                </b-table-column>
                   <b-table-column field="followers" label="Seguidores" width="5%" style="margin-left: 20px;" sortable v-slot="props">
                    {{ props.row.followers }}
                </b-table-column>
                <b-table-column field="editar" label="" width="5%" centered>
                    <b-button type="is-info" outlined title="Editar etiqueta">
                        Editar
                    </b-button> 
                </b-table-column>
                <b-table-column field="eliminar" label="" centered width="5%">
                    <b-button type="is-danger" title="Borrar etiqueta">
                        Eliminar
                    </b-button>
                </b-table-column>
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
    .pagination.is-simple .info {
        margin-right: auto;
    }

    .pagination{
        display: flex;
        align-items: center;

    }

    .pagination-link{
        align-self: center;
    }

    .table > :not(:first-child){
        border-top:none;
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

          font-weight: bold;
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