<template>
    <section> 
        <div class="admin-paises" v-if="dataReady==true">
            <div class="title">
                PAISES
            </div>

            <b-table class="table"
                :data="data"            
                :paginated="isPaginated"
                :per-page="perPage"
                :current-page.sync="currentPage"
                :pagination-simple="isPaginationSimple"
                :pagination-position="paginationPosition"
                :default-sort-direction="defaultSortDirection"
                :pagination-rounded="isPaginationRounded"
                :sort-icon="sortIcon"
                :sort-icon-size="sortIconSize"
                aria-next-label="Next page"
                aria-previous-label="Previous page"
                aria-page-label="Page"
                aria-current-label="Current page"
                :page-input="hasInput"
                :pagination-order="paginationOrder"
                :page-input-position="inputPosition"
                :debounce-page-input="inputDebounce">

                    <b-table-column field="id" label="ID" numeric width="10%" sortable searchable centered v-slot="props">
                        {{ props.row.id }}
                    </b-table-column>
                    <b-table-column field="name" label="Nombre" width="20%" style="margin-left: 20px;" sortable searchable v-slot="props">
                        {{ props.row.name }}
                    </b-table-column>
                    <b-table-column field="eliminar" label="" centered width="5%" v-slot="props">
                        <b-button type="is-danger" title="Borrar país" @click="deleteCountry(props.row.id)">
                            Eliminar
                        </b-button>
                    </b-table-column>
            </b-table>

            <div class="crud-container">
                <div class="crud">

                    <b-field class="field" label="Nombre">
                        <b-input placeholder="Noruega, España..." v-model="country.name"></b-input>
                    </b-field>

                    <b-button class="btn" type="is-success" @click="createCountry()">Crear</b-button>

                </div>
                <div class="crud">
                    <b-field class="field" label="Nombre">
                        <b-input v-model="countryUpdate.name" ></b-input>
                    </b-field>

                    <b-field class="field" label="Nuevo nombre">
                        <b-input placeholder="Noruega, España..." v-model="newCountry.name"></b-input>
                    </b-field>

                <b-button class="btn" type="is-info" @click="updateCountry(countryUpdate.name, newCountry.name)">Actualizar</b-button>
                </div>
            </div>
        </div>
   </section> 
</template>

<script>
    export default {
        data() {
            return {
                dataReady: false,
                availableCountries: [],
                isPaginated: true,
                isPaginationSimple: false,
                isPaginationRounded: false,
                paginationPosition: 'bottom',
                defaultSortDirection: 'asc',
                sortIcon: 'arrow-up',
                sortIconSize: 'is-small',
                currentPage: 1,
                perPage: 5,
                hasInput: false,
                paginationOrder: 'is-centered',
                inputPosition: '',
                inputDebounce: '',
                country:{
                    name: null
                },
                countryUpdate:{
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
                    this.getCountries();
                }).catch(error=>{
                    console.info(error.response.data)
                });
            },            
            updateCountry(country1,country2){
                axios.patch(`/api/countries/` + country1 + `/` + country2)
                .then(response => {
                    this.getCountries();
                }).catch(error => {
                    console.info(error.response.data)
                });
            },
        }
    }
</script>
<style lang="scss" scoped>
    section{
        height: 100vh;
        background-color:#f8fafc;    
    }

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
            justify-content: baseline;
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