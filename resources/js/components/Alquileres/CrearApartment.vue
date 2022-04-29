<template>
    <section>
        <div class="contenedor">
            <div class="titulo-pagina">
                <p>CREA UNA APARTAMENTO</p>
            </div>

            <div class="contenedor-dropdown"> 
                <b-dropdown append-to-body aria-role="menu" scrollable max-height="200" trap-focus>
                    <template #trigger>
                        <a class="navbar-item" role="button">
                            <span style="margin-right: 10px;">{{selectedCity}}</span>
                            <font-awesome-icon icon="fa-solid fa-caret-down" />
                        </a>
                    </template>

                    <b-dropdown-item custom aria-role="listitem">
                        <input type="text" v-model="searchTerm" autocomplete="on" id="buscador" placeholder="Buscar..." class="input">
                    </b-dropdown-item>

                    <b-dropdown-item 
                    v-for="city in filteredData" :key="city[1]" 
                    @click="setSelected(city[1])"
                    aria-role="listitem">
                        {{city[0]}}
                    </b-dropdown-item>
                </b-dropdown>
            </div>

            <b-tabs v-model="activeTab">

                <b-tab-item label="Texto">
                <b-field label="Título" >
                    <b-input maxlength="300" v-model="apartment.title"></b-input>
                </b-field>

                <b-field label="Descripción">
                    <b-input v-model="apartment.description" minlength="0" style="width:550px;" type="textarea" class="custom-input" ></b-input>
                </b-field>
                <b-field label="Precio" >
                    <b-input maxlength="300" v-model="apartment.price"></b-input>
                </b-field>
                <b-field label="Dirección" >
                    <b-input maxlength="300" v-model="apartment.address"></b-input>
                </b-field>
                <b-field label="Habitaciones" >
                    <b-input maxlength="300" v-model="apartment.bedrooms"></b-input>
                </b-field>
                <b-field label="Teléfono" >
                    <b-input maxlength="300" v-model="apartment.phone"></b-input>
                </b-field>
                <b-field label="E-mail" >
                    <b-input maxlength="300" v-model="apartment.email"></b-input>
                </b-field>
                <b-field label="Superfície(m2)" >
                    <b-input maxlength="300" v-model="apartment.surface"></b-input>
                </b-field>

                </b-tab-item>

                <b-tab-item label="Multimedia">
                    <b-field>
                    <b-upload v-model="dropFiles" style="height:300px; width:550px;" multiple drag-drop>
                        <section class="custom-section">
                            <div class="content has-text-centered">
                                <font-awesome-icon id="upload-icon" icon="fa-solid fa-upload" style="opacity:0.8; width:40px; margin-bottom: 20px; height:40px"/>
                                <p>Arrastra y suelta o selecciona</p>
                            </div>
                        </section>
                    </b-upload>
                </b-field>
                <div class="tags">
                    <span v-for="(file, index) in dropFiles"
                        :key="index"
                        class="tag is-primary" >
                        {{file.name}}
                        <button class="delete is-small"
                            type="button"
                            @click="deleteDropFile(index)">
                        </button>
                    </span>
                </div>
                
                </b-tab-item>

            </b-tabs>
            <button class="btn" @click="createApartment()">
            <p style="text-align: center;">
                Crear
            </p>
        </button>
        </div>
        <footer-web></footer-web>
    </section>
</template>

<script>

    export default{
        props: {},

        data() {
            return {
                apartment: {
                    title: null,
                    description: null,
                    price: null,
                    address: null,
                    bedrooms: null,
                    phone: null,
                    email: null,
                    img_url: null,
                    surface: null,
                    user_id: null,
                    city_id: null,
                    file: File,
                },
                dropFiles: [],
                searchTerm: '',
                availableCities: [],
                availableCitiesNames: [],
                selectedCity: 'Ciudad',
                activeTab: 0,
            }
        },
        computed: {
            filteredData() {
                this.availableCitiesNames = this.availableCities.map((item) => [item.name, item.id]);
                return this.availableCitiesNames.filter((item) => item[0].toLowerCase().indexOf(this.searchTerm.toLowerCase()) >= 0);
            },
        },

        methods: {
            createApartment() {
                const formData = new FormData();
                formData.append('apartment', JSON.stringify(this.apartment));
                formData.append('file', this.dropFiles[0]);
                axios.post(`/api/apartments`, formData).then(response => {
                    console.log(response);
                }).catch(error => {
                    if (error.response.status === 403) {
                        window.location.href = "/login";
                    } else if (error.response.status === 422) {
                    alert("Hay campos obligatorios");
                    }
                })
            },
            deleteDropFile(index) {
                console.log(this.dropFiles);
                this.dropFiles.splice(index, 1)
            },
            getCities() {
            axios.get(`/api/cities`)
                .then(response => {
                    this.availableCities = response.data.cities;
                }).catch(error => {
                    console.info(error)
                });
            },
            getSelected(selected) {
                axios.post(`/api/get_city_by_id`, {
                    id: selected
                })
                    .then(response => {
                        this.apartment.city_id = response.data.city.id;
                        this.selectedCity = response.data.city.name;
                    }).catch(error => {
                        console.info(error)
                    });
            },
            setSelected(option) {
                console.log(this.dropFiles);
                this.getSelected(option);
            },
        },

        created() {
            this.getCities();
        },
    }

</script>

<style lang="scss" scoped>

  .titulo-pagina {
      justify-content: center;
      display: flex;
      margin: 20px 0 15px 0;
      font-size: x-large;
      color:#00309a;
      font-family: sans-serif;
    }

   .upload-draggable{
        width: 550px;
        height: 300px;
    }

   .custom-section{
        width: 550px;
        height: 300px;
    }

    .contenedor{
      display:flex;
      flex-flow: column wrap;
      // justify-content: space-between;
    }
</style>