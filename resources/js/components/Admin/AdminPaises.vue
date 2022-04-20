<template>
    <div class="admin-paises" v-if="dataReady==true">
        <div class="title">
            PAISES
        </div>
        <b-table class="table"
            :data="data"
            :debounce-search="1000"
            :paginated=true
            :per-page=5>
                <b-table-column field="id" label="ID" numeric width="10%" sortable searchable centered v-slot="props">
                    {{ props.row.id }}
                </b-table-column>
                <b-table-column field="name" label="Nombre" width="20%" style="margin-left: 20px;" sortable searchable v-slot="props">
                    {{ props.row.name }}
                </b-table-column>
                <b-table-column field="editar" label="" width="5%" centered>
                    <b-button type="is-info" outlined title="Editar país">
                        Editar
                    </b-button> 
                </b-table-column>
                <b-table-column field="eliminar" label="" centered width="5%" v-slot="props">
                    <b-button type="is-danger" title="Borrar país" @click="deleteCountry(props.row.id)">
                        Eliminar
                    </b-button>
                </b-table-column>
        </b-table>

        <div class="crud-container">

            <div class="create">

                <b-field class="field" label="Nombre">
                    <b-input placeholder="Noruega, España..." v-model="country.name"></b-input>
                </b-field>

                <b-button class="btn" type="is-success" @click="createCountry()">Crear</b-button>
            </div>


            <div class="update">

                <b-field class="field" label="Nombre">
                    <b-input v-model="country.name" ></b-input>
                </b-field>

                <b-field class="field" label="Nuevo nombre">
                    <b-input placeholder="Noruega, España..." v-model="newCountry.name"></b-input>
                </b-field>

                <b-button class="btn" type="is-info" @click="updateCountry()">Actualizar</b-button>
            </div>

        </div>
  
    </div>
    
</template>

<script>
    export default {
        data() {
            return {
                dataReady: false,
                availableCountries: [],
                country:{
                    name: null
                },
                newCountry:{
                    name: null
                },
                columns: [
                    {
                        field: 'id',
                        label: 'ID',
                        width: '20%',
                        centered:true,
                        numeric: true,
                        searchable: true
                    },
                    {
                        field: 'name',
                        label: 'Nombre',
                        searchable: true
                    },
                    {
                        field: 'edit',
                        label: 'Editar',
                        centered:true,
                    },
                    {
                        field: 'delete',
                        label: 'Eliminar',
                        centered:true,
                    }
                ]
            }
        },
        created(){
            this.getCountries();
        },
        computed:{
            data(){
                const a = this.availableCountries.map((item) => ({id: item.id, name: item.name}));
                return a;
            }
        },
        methods: {
            getCountries(){
                axios.get(`/api/countries`)
                .then(response => {
                    this.availableCountries = response.data.countries;
                    this.dataReady = true;
                }).catch(error => {
                    console.info(error.response.data)
                });
            },
            deleteCountry(id){ 
                axios.delete(`/api/countries/` + id)
                .then(response => {
                    this.getCountries();
                }).catch(error => {
                    console.info(error.response.data)
                });
            },
            createCountry(){
                axios.post(`/api/countries/`, this.country)
                .then(response =>{
                    console.log("aa");
                    this.getCountries();
                }).catch(error=>{
                    console.info(error.response.data)
                });
            },            
            updateCountry(id){
                console.log("a");
                axios.put(`/api/cities/` + id)
                .then(response => {
                    this.getCities();
                }).catch(error => {
                    console.info(error.response.data)
                });
            },
        }
    }
</script>
<style lang="scss" scoped>
    .title {
        justify-content: center;
        display: flex;
        margin-top: 20px;
        font-size: x-large;
        color: #00309a;
        font-family: sans-serif;
    }
    .admin-paises {
    flex-direction: column;
    align-items: center;
    display:flex;
    justify-content: center;
    // El navbar mide 280px aprox
    // margin-left: 300px;
    height: 100%;
    margin: 10px 30px 30px 330px;


    .table{
        width: 70%;
    }
    .table > :not(:first-child) {
        border-top: 0ch;
    }

    .crud-container{
        width: 100%;
        display:flex;
        flex-flow: row wrap;
        height: 100%;
        justify-content: center; 
        
        .crud{
            display:flex;
            flex-flow: column;
            width: 50%;
            justify-content: space-between;
            align-items: center;
            .field{
                width: 350px;
            }
            .btn{
                width: 250px;
            }

        }
    }
    
    
}

</style>