<template>
    <div class="admin-ciudades" v-if="dataReady==true">
        <div class="title">
            CIUDADES
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
                    <b-button type="is-info" outlined title="Editar ciudad">
                        Editar
                    </b-button> 
                </b-table-column>
                <b-table-column field="eliminar" label="" centered width="5%" v-slot="props">
                    <b-button type="is-danger" title="Borrar ciudad" @click="deleteCity(props.row.id)">
                        Eliminar
                    </b-button>
                </b-table-column>
        </b-table>

        <div class="crud-container">

            <div class="crud">
                <b-field class="field" label="Nombre">
                    <b-input placeholder="Madrid, Praga..." v-model="city.name"></b-input>
                </b-field>

//TODO:

<!-- Dropdown aqui bueno de paises gracias babys


                    <b-dropdown append-to-body aria-role="menu" scrollable max-height="200" trap-focus>
                    <template #trigger>
                        <a class="navbar-item" role="button" style="padding-left: 20px;">
                            <span style="margin-right: 10px;">mario</span>
                            <font-awesome-icon icon="fa-solid fa-caret-down" />
                        </a>
                    </template>

                    <b-dropdown-item custom aria-role="listitem">
                        <input type="text" v-model="searchTerm" autocomplete="on" id="buscador" placeholder="Buscar..." class="input">

                    </b-dropdown-item>

                    <b-dropdown-item v-for="pais in paises" :key="pais[1]" 
                    @click ="setSelected(pais[1])" 
                    aria-role="listitem">
                        {{pais[0]}}
                    </b-dropdown-item>
                </b-dropdown> -->

                <b-button class="btn" type="is-success" @click="createCity()">Crear</b-button>
            </div>


            <div class="crud">

                <b-field class="field" label="Nombre">
                    <b-input ></b-input>
                </b-field>

                <b-field class="field" label="Nuevo nombre">
                    <b-input placeholder="Madrid, Praga..."></b-input>
                </b-field>

                <b-button class="btn" type="is-info" @click="updateCity()">Actualizar</b-button>
            </div>

        </div>
  
    </div>
    
</template>

<script>
    export default {
        data() {
            return {
                city: {
                    name: null
                },
                paises: [],
                dataReady: false,
                availableCities: [],
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
        created() {
            this.getCities();
            this.getCountries();
        },
        computed:{
            data(){
                const a = this.availableCities.map((item) => ({id: item.id, name: item.name}));
                return a;
            }
        },
        methods: {
            getCountries(){
                axios.get(`/api/countries`)
                .then(response => {
                    this.paises = response.data.countries;
                }).catch(error => {
                    console.info(error.response.data)
                });
            },
            getCities() {
                axios.get(`/api/cities`)
                .then(response => {
                    this.availableCities = response.data.cities;
                    this.dataReady = true;
                }).catch(error => {
                    console.info(error.response.data)
                });
            },
            deleteCity(id){ 
                axios.delete(`/api/cities/` + id)
                .then(response => {
                    this.getCities();
                }).catch(error => {
                    console.info(error.response.data)
                });
            },
            createCity(){
                axios.post(`/api/cities/`, this.city)
                .then(response =>{
                    console.log("aa");
                    this.getCities();
                }).catch(error=>{
                    console.info(error.response.data)
                });
            },
            updateCity(//TODO:id?
            ){
                axios.put(`/api/cities/` + id)
                .then(response => {
                    this.getCities();
                }).catch(error => {
                    console.info(error.response.data)
                });
            },
            setSelected(option) {
                console.log(this.dropFiles);
                this.getSelected(option);
            }
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
    .admin-ciudades {
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