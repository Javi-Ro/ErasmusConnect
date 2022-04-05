<template>
  <section>
    <div class="contenedor">
     <h3 style="color: #00309a; margin-bottom: 15px;"> Crear una publicación </h3> 
      <div class="contenedor-dropdown"> 
          <b-dropdown append-to-body aria-role="menu" scrollable max-height="200" trap-focus>
              <template #trigger>
                  <a class="navbar-item" role="button">
                      <span style="margin-right: 10px;">Ciudad</span>
                      <font-awesome-icon icon="fa-solid fa-caret-down" />
                  </a>
              </template>

              <b-dropdown-item custom aria-role="listitem">
                  <input type="text" autocomplete="on" id="buscador" placeholder="Buscar..." class="input">
              </b-dropdown-item>
              <b-dropdown-item> Prague </b-dropdown-item>
              <b-dropdown-item> Milán </b-dropdown-item>
              <b-dropdown-item> Budapest </b-dropdown-item>
              <b-dropdown-item> Berlín </b-dropdown-item>
              <b-dropdown-item> Gdansk </b-dropdown-item>
          </b-dropdown>
        </div>

        <b-tabs v-model="activeTab">

            <b-tab-item label="Texto">
              <b-field label="Título" >
                  <b-input maxlength="300"></b-input>
              </b-field>

              <b-field label="Texto">
                  <b-input minlength="0" style="width:550px;" type="textarea" class="custom-input"></b-input>
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
            <!-- disabled -->
            <b-tab-item label="Enlace">  
              <b-field>
                  <b-input placeholder="URL" style="width:550px;" maxlength="300" type="url"></b-input>
              </b-field>
            </b-tab-item>
        </b-tabs>

        <button class="btn">
            <p style="text-align: center; margin-left: 6px;">
                Publicar
            </p>
        </button>

    </div>

    <div class="footer">
      <footer-web></footer-web>
    </div>
  </section>

</template>

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

</style>
<style lang="scss" scoped>

  .upload-draggable{
    width: 550px;
    height: 300px;

  }

  .custom-section{
    width: 550px;
    height: 300px;
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
        height: calc(100vh - 130px);
  }

  .input-size{
    width: 550px;
  }

  .contenedor{
      display:flex;
      flex-flow: column wrap;
      justify-content: space-between;
  }

  b-input{
    width: 500px;
    align-self: center;
  }

  .btn {
	width: 100px;
  display:flex;
  background-color: #00309a;
  font-weight: bold;
  font-size: 0.9rem;
  font-family: Arial, Helvetica, sans-serif; 
	padding: .6rem 1rem;
	border-radius: 10rem;
	position: relative;
	overflow: hidden;
  color:white;
  align-self:center;
}

.btn:hover {
  color: yellow;
}

</style>

<script>
import filterBarHorizontal from './filterBarHorizontal.vue'
  export default {
  components: { filterBarHorizontal },
    props: {},
      data() {
        return {
            dropFiles: []
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
    computed: {},
    methods: {
        deleteDropFile(index) {
            this.dropFiles.splice(index, 1)
        }},
    mounted() {}
  }
</script>