<template>
    <section>
        <div class="contenedor">
            <div class="titulo-pagina">
                <p>PUBLICA UN ALQUILER</p>
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

            <b-field class="campo" label="Título" >
                <b-input maxlength="300" style="width:100%;" v-model="apartment.title"></b-input>
            </b-field>

            <b-field class="campo"   label="Descripción">
                <b-input v-model="apartment.description" minlength="0" style="width:100%;" type="textarea"></b-input>
            </b-field>

            <b-field class="campo"  label="Precio mensual (€)" >
                <b-input v-model="apartment.price" minlength="0" style="width:100%;" type="number" min="0"> </b-input> 
            </b-field>

            <b-field class="campo" label="Dirección" >
                <b-input maxlength="300" id="autocomplete" style="width:100%;" v-model="apartment.address"></b-input>
            </b-field>

            <b-field class="campo"  label="Número de habitaciones" >
                <b-slider size="is-medium" style="margin-top:4%; margin-bottom:4%" v-model="apartment.bedrooms" :min="0" :max="10">
                    <template v-for="val in [2, 4, 6, 8]">
                        <b-slider-tick :value="val" :key="val">{{ val }}</b-slider-tick>
                    </template>
                </b-slider>
            </b-field>

            <b-field class="campo"  label="Teléfono de contacto" >
                <b-input maxlength="300" style="width:100%;" v-model="apartment.phone"></b-input>
            </b-field>
            <b-field class="campo"   label="E-mail" >
                <b-input maxlength="300" style="width:100%;" type="email" v-model="apartment.email"></b-input>
            </b-field>
            <b-field class="campo"   label="Superficie en metros cuadrados" >
                <b-input style="width:100%;"  type="number" min="0" v-model="apartment.surface"></b-input>
            </b-field>

            <b-field class="campo" label="Selecciona algunas etiquetas para mejorar la búsqueda">
                <b-taginput
                    v-model="tags"
                    :data="filteredTags"
                    autocomplete
                    :open-on-focus="openOnFocus"
                    field="name"
                    icon="label"
                    placeholder="Añade una etiqueta"
                    @typing="getFilteredTags"
                    >
                </b-taginput>
            </b-field>

            <b-field class="campo2" >
                <b-upload v-model="dropFiles" style="height:300px; width:100%" multiple accept="image/*" drag-drop>
                    <div class="content has-text-centered" >
                        <font-awesome-icon id="upload-icon" icon="fa-solid fa-upload" style="opacity:0.8; width:40px; margin-top: 20%; height:40px"/>
                        <br>
                        <br>
                        <p style="text-align:center;" >Arrastra y suelta o selecciona</p>
                    </div>
                </b-upload>

            </b-field>

            <div class="tags campo" >
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
                

        <button class="btn" @click="createApartment()">
            <p style="text-align: center;">
                Publicar
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
                tags: [],
                filteredTags: [],
                data: this.getTags(),
                openOnFocus: false
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
                console.log(this.tags);
                const formData = new FormData();
                formData.append('apartment', JSON.stringify(this.apartment));

                formData.append('file', this.dropFiles[0]);
                console.log(formData);
                axios.post(`/api/apartments`, formData).then(response => {
                console.log(response.data.apartment);
                axios.post('/api/apartments/tags', {
                    apartment:response.data.apartment, 
                    tags:this.tags,

                }).then(response=> {console.log(response.data)});

                window.location.href = "/apartments";
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

            getTags() {
     
            axios.get(`/api/tags/apartments`)
                .then(response => {
                    this.data = response.data.tags;
                }).catch(error => {
                    console.info(error)
                });
            },

            getFilteredTags(text) {

                this.filteredTags = this.data.filter((option) => {
                    return option.name
                        .toString()
                        .toLowerCase()
                        .indexOf(text.toLowerCase()) >= 0
                })
            }
            // getTags() {
            // axios.get(`/api/tags/posts`).then(response => {
            //     this.tags = response.data.tags;
            // }).catch(error => {
            //     console.info(error);
            // });

        },

        created() {
            this.getCities();
            this.getTags();
        },
    }

</script>


<style lang="scss">
    .b-slider.is-primary .b-slider-fill {
        background: #00309a !important;
    }
    .b-tooltip.is-primary .tooltip-content {
        background: #00309a;
        color: #fff;
    }

    .campo{
        width: 30%;
    }

    .campo2{
        width: 30%;
        margin-top:2%;
    }

    .upload-draggable{
        width: 100%;
    }

@media(max-width: 500px){
    .campo{
        width: 60%;
    }

    .campo2{
        width: 60%;
    }

    .textarea{
        max-width: 100%;
        min-width: 100%;
    }

}
</style>
<style lang="scss" scoped>

  .upload-draggable{
    width: 100%;
    height: 300px;

  }

    .navbar-item {
    color: #00309a;
    padding: 0px;
  }

  .titulo-pagina {
      justify-content: center;
      display: flex;
      margin: 20px 0 15px 0;
      font-size: x-large;
      color:#00309a;
      font-family: sans-serif;
    }

    .contenedor{
        margin-top: 130px;
        display:flex;
        flex-direction: column;
        flex-wrap: nowrap;
        align-items: center;
        height: auto;
        justify-content: space-between;
        width: 100%;
    }

    .contenedor-dropdown{
        width: 30%;
        margin-bottom:2%;
        left:0%;
    }

    .btn {
        justify-content: center;
        width: 10%;
        display:flex;
        background-color: #00309a;
        font-weight: bold;
        font-size: 1.2rem;
        font-family: Arial, Helvetica, sans-serif; 
        padding: .6rem 5.5rem;
        border-radius: 10rem;
        position: relative;
        overflow: hidden;
        color:white;
        align-self:center;
        text-align: center;
    }

    .btn:hover {
    color: #F2AF13;
    }

    a.navbar-item:focus, a.navbar-item:focus-within, a.navbar-item:hover, a.navbar-item.is-active, .navbar-link:focus, .navbar-link:focus-within, .navbar-link:hover, .navbar-link.is-active {
    background-color: transparent;
}

</style>