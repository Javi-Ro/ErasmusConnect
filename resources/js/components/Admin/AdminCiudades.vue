<template>
    <section>
        <div class="admin-ciudades" v-if="dataReady==true">
            <div class="title">
                CIUDADES
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
                
                    <b-table-column field="id" label="ID" numeric centered width="10%" sortable searchable  v-slot="props">
                        {{ props.row.id }}
                    </b-table-column>
                    <b-table-column field="name" label="Nombre" width="20%" sortable searchable v-slot="props">
                        {{ props.row.name }}
                    </b-table-column>
                    <b-table-column field="eliminar" label="" centered width="5%" v-slot="props">
                        <b-button type="is-danger" title="Borrar ciudad" @click="deleteCity(props.row.id)">
                            Eliminar
                        </b-button>
                    </b-table-column>
            </b-table>

            <div class="crud-container">

                <div class="crud">

                    <b-field class="field" label="País">
                        <b-dropdown  scrollable max-height="150" append-to-body class="dropdown"> 
                            <template #trigger="{ active }">
                                <b-button style="width: 350px;"
                                    :label="selectedCountry"
                                    :icon-right="active ? 'menu-up' : 'menu-down'" />
                            </template>

                            <b-dropdown-item
                            v-for="country in filteredData" :value="country[1]" :key="country[1]"
                            @click="setSelected(country[1])" 
                            aria-role="listitem"> 
                                {{country[0]}} 
                            </b-dropdown-item>
                        </b-dropdown>

                    </b-field>

                    <b-field class="field" label="Nombre">
                        <b-input placeholder="Madrid, Praga..." v-model="city.name"></b-input>
                    </b-field>

                    <b-button class="btn" type="is-success" @click="createCity()">Crear</b-button>
                </div>

                <div class="crud">

                    <b-field class="field" label="Nombre">
                        <b-input v-model="cityUpdate.name"></b-input>
                    </b-field>

                    <b-field class="field" label="Nuevo nombre">
                        <b-input placeholder="Madrid, Praga..." v-model="newCity.name"></b-input>
                    </b-field>

                    <b-button class="btn" type="is-info" @click="updateCity(cityUpdate.name, newCity.name)">Actualizar</b-button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {

                selected: -1,
                selectedCountry: 'Select Country',

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
 
                city: {
                    name: null,
                    country_id: -1
                },


                cityUpdate:{
                    name: null
                },
                newCity: {
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
            },
            filteredData() {
                const b = this.paises.map((item) => [item.name, item.id]);
                console.log(b);
                return b;
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
                this.city.country_id = this.selected;
                axios.post(`/api/cities/`, this.city)
                .then(response =>{
                    this.getCities();
                }).catch(error=>{
                    console.info(error.response.data)
                });
            },
            updateCity(city1,city2){
                axios.patch(`/api/cities/` + city1 + `/` + city2)
                .then(response => {
                    this.getCities();
                }).catch(error => {
                    console.info(error.response.data)
                });
            },
            setSelected(option) {
                this.getSelected(option);
            },
            getSelected(selected) {
                axios.post(`/api/get_country_by_id`, {
                    id: selected
                })
                    .then(response => {
                        this.selected = response.data.country.id; // ID de la clase seleccionada
                        this.selectedCountry = response.data.country.name;
                    }).catch(error => {
                        console.info(error)
                    });
            }
        }
    }
</script>

<style>
    .custom{
        background-color: pink;
        width: 350px;
    }

    .dropdown:focus{
        border-color: #00309a !important;
        -webkit-box-shadow: 0 0 0 0.125em rgb(0 18 60 / 25%);
        box-shadow: 0 0 0 0.125em  rgb(0 18 60 / 25%);
    }
    .button:focus, .button.is-focused {
        border-color: #00309a;
        /* color: #00309a; */
    }

</style>

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