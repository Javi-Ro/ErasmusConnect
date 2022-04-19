<template>
    <section class="login-main" v-if="dataReady==true">
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
                <b-table-column field="created_at" label="Fecha de unión" width="20%" style="margin-left: 20px;" sortable v-slot="props">
                    {{ props.row.created_at }}
                </b-table-column>
                <b-table-column field="followers" label="Seguidores" width="5%" style="margin-left: 20px;" centered sortable v-slot="props">
                    {{ props.row.followers }}
                </b-table-column>
                <b-table-column field="eliminar" label="" centered width="5%" v-slot="props">
                    <b-button type="is-danger" title="Borrar etiqueta" @click="deleteUser(props.row.id)">
                        Eliminar
                    </b-button>
                </b-table-column>
        </b-table>

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
                dataReady: false,
                availableUsers: [],
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
        },
        created(){
            this.getUsers();
        },
        computed:{
            data(){
                const a = this.availableUsers.map((item) => ({id: item.id, nickname: item.nickname, email: item.email, created_at: item.created_at, followers: item.followers}));
                return a;
            }
        },
        methods: {
            getUsers(){
                axios.get(`/api/users`)
                    .then(response => {
                        this.availableUsers = response.data.user; //TODO: user?
                        this.dataReady = true;
                    }).catch(error => {
                        console.info(error.response.data)
                    });
            },
            deleteUser(id){ 
                axios.delete(`/api/users/` + id)
                .then(response => {
                    this.getUsers();
                }).catch(error => {
                    console.info(error.response.data)
                });
            }
        }
    }

</script>