<template>
  <section>
    <div class="contenedor">
        <div class="titulo-pagina">
            <p>CREA UNA PUBLICACIÓN</p>
        </div>
        <div class="contenedor-dropdown"> 
          <b-dropdown append-to-body aria-role="menu" style="left:3%;" scrollable max-height="200" trap-focus>
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

        <b-tabs v-model="activeTab" class="crear-tabs">

            <b-tab-item label="Texto">
              <b-field label="Título" >
                  <b-input maxlength="300" v-model="post.title"></b-input>
              </b-field>

              <b-field label="Texto">
                  <b-input minlength="0"  type="textarea" class="custom-input" v-model="post.text"></b-input>
              </b-field>   
              <b-field label="Selecciona algunas etiquetas para mejorar la búsqueda">
                <b-taginput
                    v-model="tags"
                    :data="filteredTags"
                    autocomplete
                    :open-on-focus="openOnFocus"
                    field="name"
                    icon="label"
                    placeholder="Añade una etiqueta"
                    maxtags="3"
                    @typing="getFilteredTags"
                    >
                </b-taginput>
            </b-field>


            </b-tab-item>

            <b-tab-item label="Multimedia">
                <b-field class="upload-custom">
                  <b-upload v-model="dropFiles" multiple accept="image/*" drag-drop>
                      <section class="custom-section">
                          <div class="content has-text-centered centrado">
                              <font-awesome-icon id="upload-icon" icon="fa-solid fa-upload" class="icono-crear"/>
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

        <button class="btn" @click="createPost()">
            <p style="text-align: center;">
                Publicar
            </p>
        </button>

    </div>
      <footer-web></footer-web>
  </section>
      


</template>

<script>
import filterBarHorizontal from './filterBarHorizontal.vue'
  export default {
  components: { filterBarHorizontal },
    props: {},
      data() {
        return {
            post: {
              title: null,
              text: null,
              img_url: null,
              city_id: null,
              user_id: null,
              post_id: null,
              file: File
            },
            activeTab: 0,
            searchTerm: '',
            availableCities: [],
            availableCitiesNames: [],
            selectedCity: 'Ciudad',
            dropFiles: [],
            tags: [],
            filteredTags: [],
            data: this.getTags(),
            openOnFocus: false
        }
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
    computed: {
      filteredData() {
          this.availableCitiesNames = this.availableCities.map((item) => [item.name, item.id]);
          return this.availableCitiesNames.filter((item) => item[0].toLowerCase().indexOf(this.searchTerm.toLowerCase()) >= 0);
      },
    },
    methods: {
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
                    this.post.city_id = response.data.city.id; // ID de la clase seleccionada
                    this.selectedCity = response.data.city.name;
                }).catch(error => {
                    console.info(error)
                });
        },
        setSelected(option) {
            console.log(this.dropFiles);
            this.getSelected(option);
        },
        createPost() {
          const formData = new FormData();
          formData.append('post', JSON.stringify(this.post));
          formData.append('file', this.dropFiles[0]);
          console.log('gordo', this.tags);
          axios.post(`/api/posts`, formData).then(response => {
            axios.post('/api/posts/tags', {
            post:response.data.post, 
            tags:this.tags,
          }).then(response=> {
              window.location.href = "/foro";
              console.log(response.data)});

            // console.log(response);
          }).catch(error => {
            if (error.response.status === 403) {
              window.location.href = "/login";
            } else if (error.response.status === 422) {
              alert("El titulo es obligatorio");
            }
          })
        },
        getTags() {
     
            axios.get(`/api/tags/posts`)
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

    },
    mounted() {},
    created() {
      this.getCities();
    }
  }
</script>

<style>

  .custom-input:focus{
      border-color: #00309a !important;
      -webkit-box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
      box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
  }

  .input:focus{
      border-color: #00309a !important;
      -webkit-box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
      box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
  }

  .tag:not(body).is-primary{
    background-color: #00309a;
    color:white;
  }

   .b-tabs .tabs {
      margin-top: 0px !important;
  }

  @media(max-width: 500px){
    .taginput .taginput-container.is-focusable, .textarea, .input {
        -webkit-box-shadow: inset 0 0.0625em 0.125em rgb(10 10 10 / 5%);
        box-shadow: inset 0 0.0625em 0.125em rgb(10 10 10 / 5%);
        max-width: 100%;
        width: 100%;
        min-width:80%;
        align-self:center;
    }

    .upload-draggable{
      height: 300px;
      align-self: center;
    }

    .custom-section{
      margin-top: 0px;
      width: 90%;
    }

  }
</style>
<style lang="scss" scoped>

  html, body {
    height:100%;
    width:100%;
    background-color: whitesmoke;
    overflow-x:hidden;
  }

  .titulo-pagina {
    margin: 20px 0 15px 0;
    font-size: x-large;
    color:#00309a;
    font-family: sans-serif;
    display:flex;
    justify-content: center;
    align-self: center;
  }

  .contenedor-dropdown{
    margin-bottom: 15px;
  }

  .navbar-item {
    color: #00309a;
    padding: 0px;
  }

  a.navbar-item:hover {
    background-color: transparent;
  }

  .dropdown-item:active {
    background-color: transparent;
  }

  // Para cambiarle el borde a los input text
  .input:focus{
    border-color: #00309a !important;
    -webkit-box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
    box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
  }

  .contenedor{
    display:flex;
    flex-flow: column wrap;
    // justify-content: space-between;
  }

  .footer{
    display:flex;
  }
  
  section{
    margin-top: 130px;
    display:flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-items: center;
    height: auto;
    justify-content: space-between;
    // height: calc(100vh - 130px);
  }

  .input-size{
    width: 550px;
  }

  b-input{
    width: 500px;
    align-self: center;
  }

  .btn {
    justify-content: center;
    width: 40%;
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

.custom-input{
  width:550px;
}

.upload-draggable{
  width: 550px;
  height: 300px;
}

.custom-section{
  margin-top: 0px;
  width: 550px;
  height: 300px;
}

.icono-crear{
  opacity:0.8; 
  width:40px; 
  margin-bottom: 20px; 
  height:40px;
  margin-top: 90px;
}

@media(max-width: 500px){
  
  .custom-input{
    width: 100%;
    min-width:0px;
  }

  .titulo-pagina {
    display:flex;
    font-size: x-large;
    margin:0px 0px 0px 0px;
    color:#00309a;
    font-family: sans-serif;
    align-self: center;
    width: 80vw;
  }

  .b-tabs .tab-content .tab-item{
    padding: 10px;
  }

  .contenedor{
    width:90vw;
    max-width:100%;
    overflow-x:hidden;
    margin-inline: auto;
  }

  .taginput .taginput-container.is-focusable, .textarea, .input {
    -webkit-box-shadow: inset 0 0.0625em 0.125em rgb(10 10 10 / 5%);
    box-shadow: inset 0 0.0625em 0.125em rgb(10 10 10 / 5%);
    width: 100%;
    min-width:80%;
    align-self:center;
  }
  
  .icono-crear{
    margin-bottom: 20%; 
  }

  .centrado{
    left:5%;
    bottom: 50vh;
  }

  .custom-section{
    width: 80vw;
    height: 100%;
    margin-inline: auto;
  }

  .contenedor-dropdown{
    margin-bottom: 5%;
    margin-top: 15%;
  }

  p {
    text-align: center;
  }
}

</style>