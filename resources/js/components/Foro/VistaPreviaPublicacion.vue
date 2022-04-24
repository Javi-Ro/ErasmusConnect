<template>
  <section :class="['main-vp-publicacion', comment ? 'comment' : '']" :id="view">
    <div class="centered-container">
      <a :href="'/publicacion/' + post.id" style="color:black;" title="Ver publicación" v-if='view == ""'>
        <div class="content-main" v-if="!comment && post.img_url != null">
          <img :src="imgUrl" alt="Foto" width="100%" height="auto">
        </div>
      </a>
      <div class="content-main" v-if="view == 'unique' && post.img_url != null">
        <img :src="imgUrl" alt="Foto" width="100%" height="auto">
      </div>
      <div class="information">
          <div class="information-personal-title title-save" v-if="!comment">
            <p>{{ post.title }}</p>
            <div class="information-options-option tag-0" id="select-option-0" 
            @click="reaction(0)">
              <div id="background-option-0" style="padding: 0 10px;">
                <font-awesome-icon icon="fa-regular fa-bookmark" style="font-size: 25px; padding: 4px 4px;" title="Guardar"
                v-if="saved == false"/>
                <font-awesome-icon icon="fa-solid fa-bookmark" style="font-size: 25px; padding: 4px 4px;" title="Quitar de guardados"
                v-if="saved == true"/>
              </div>
            </div>
          </div>
          <div class="information-personal">
            <div v-if="post" class="information-personal-img">
              <img v-if="Object.entries(user).length!==0" :src="imgProfile" alt="Profile image">
            </div>
            <div class="information-personal-data">
              <div class="information-personal-data-main">
                <p class="information-personal-data-main-user">{{ user.nickname }}</p>
                <!-- <b-button class="information-personal-data-main-button" type="is-link" outlined v-if="!comment">
                  Guardar
                </b-button> -->
              </div>
              <div class="information-personal-data-date">
                <p>{{ post.created_at }}</p>
              </div>
            </div>
          </div>
          <div class="information-description">
            <p>
              {{ post.text }}
            </p>
          </div>
          <div class="information-options" id="tags" v-if="!comment">
            <div class="information-options-option" v-for="(tag, index) in postTags" :key="index">
              <b-tag type="is-info is-light">{{tag.name}}</b-tag>
            </div>
          </div>
          <!-- Opciones para los comentarios -->
          <div class="information-options" v-if="comment">
            <div :class="[
              'information-options-option tag-' + option.id,
              liked && index == 0 ? 'liked' : ''
              ]" 
            v-for="(option, index) in optionsData" :key="index" 
            :id="'select-comment-option-' + option.id" @click="reaction(option.id, true)">
              <div :id="'background-comment-option-' + option.id">
                <font-awesome-icon icon="fa-regular fa-heart" style="font-size: 25px; padding: 4px 4px;" title="Me gusta"
                v-if="index == 0 && liked == false"/>
                <font-awesome-icon icon="fa-solid fa-heart" style="font-size: 25px; padding: 4px 4px;" title="Ya no me gusta"
                v-if="index == 0 && liked == true"/>
              </div>
              <div class="information-options-option-data" v-if="index == 0 && liked == false">
                <!-- <strong>{{ option.title }}</strong> -->
                <p>{{ option.data }}</p>
              </div>
              <div class="information-options-option-data" v-if="index == 0 && liked == true">
                <!-- <strong>{{ option.title }}</strong> -->
                <p>{{ option.data }}</p>
              </div>
            </div>
          </div>

          <!-- Opciones para las publicaciones -->
          <div class="information-options" v-if="!comment">
            <div :class="[
              'information-options-option tag-' + option.id,
              liked && index == 0 ? 'liked' : ''
              ]" 
              v-for="(option, index) in optionsData" :key="index"
              :id="'select-option-' + option.id" @click="reaction(option.id, false)">
            
              <a :href="'/publicacion/' + post.id" v-if="index == 1" class="comment-option">
                <div :id="'background-option-' + option.id">
                <font-awesome-icon icon="fa-regular fa-comment" style="font-size: 25px; padding: 4px 4px;" title="Ver Comentarios"
                v-if="index == 1"/>
                </div>
                <div class="information-options-option-data">
                  <!-- <strong>{{ option.title }}</strong> -->
                  <p>{{ option.data }}</p>
                </div>
              </a>

              <div :id="'background-option-' + option.id">
                <font-awesome-icon icon="fa-regular fa-heart" style="font-size: 25px; padding: 4px 4px;" title="Me gusta"
                v-if="index == 0 && liked == false"/>
                <font-awesome-icon icon="fa-solid fa-heart" style="font-size: 25px; padding: 4px 4px;" title="Ya no me gusta"
                v-if="index == 0 && liked == true"/>
                <!-- <font-awesome-icon icon="fa-regular fa-comment" style="font-size: 25px; padding: 4px 4px;" title="Comentarios"
                v-if="index == 1"/> -->
                <font-awesome-icon icon="fa-solid fa-share-nodes" style="font-size: 25px; padding: 4px 4px; padding: 10px 10px;" title="Compartir"
                v-if="index == 2" />
                <!-- este icono es pro asi que no se que hacer -->
                <font-awesome-icon icon="fa-regular fa-thumbs-down" title="Reportar" v-if="index ==3" @click="showModal = 1"  style="cursor: pointer; font-size: 25px; padding: 10px 10px;"></font-awesome-icon>
                
                <!-- <font-awesome-icon icon="fa-regular fa-flag" title="Reportar" v-if="index ==3" @click="showModal = 1"  style="cursor: pointer; font-size: 25px; padding: 4px 4px;"></font-awesome-icon> -->

                <!-- <b-button v-if="index ==3" @click="showModal = 1"> reportar </b-button> -->
              </div>
              <div class="information-options-option-data" v-if="index == 0 && liked == false">
                <!-- <strong>{{ option.title }}</strong> -->
                <p>{{ option.data }}</p>
              </div>
              <div class="information-options-option-data" v-if="index == 0 && liked == true">
                <!-- <strong>{{ option.title }}</strong> -->
                <p>{{ option.data }}</p>
              </div>
            </div>
          </div>
      </div>
    </div>
        <div class="modal-vue" :id="0">

            <!-- overlay -->
            <!-- Cuando se clicka fuera del modal pasa a valer 0 -->
            <div class="overlay" v-if="showModal == 1" @click="showModal = 0"></div>
            
            <!-- modal -->
            <!-- Solo aparece cuando showModal tiene el mismo valor que el id del reporte al que corresponde -->
            <div class="modal" id="modal" style="background-color:whitesmoke; padding-top: 1%;" v-if="showModal == 1">  
            <span id='clickableAwesomeFont' @click="showModal = 0, activeTab = 0"> <font-awesome-icon icon="fa-regular fa-circle-xmark fa-2xl"/></span>

            <b-tabs v-model="activeTab">
                <b-tab-item value="0">
                        <div class="ventana-reportes">
                            <div class="label">
                                <label style="font-weight:bold; text-align:center; self-align:center; font-family:Roboto, Helvetica, Arial, sans-serif; font-size:1.5rem; margin-left: 25px;" > ¿Por qué quieres denunciar esta publicación? </label>
                            </div>
                            <b-button size="is-medium" type="is-light" style="width:100%;" @click="activeTab = 1; motivo='Es spam'"> Es spam </b-button>
                            <b-button size="is-medium" type="is-light" style="width:100%;" @click="activeTab = 1;motivo='Desnudos o actividad sexual'"> Desnudos o actividad sexual </b-button>
                            <b-button size="is-medium" type="is-light" style="width:100%;" @click="activeTab = 1; motivo='Lenguaje o símbolos que incitan al odio'"> Lenguaje o símbolos que incitan al odio </b-button>
                            <!-- <b-button size="is-medium" type="is-light" style="width:100%;"> Violencia u organizaciones peligrosas </b-button> -->
                            <b-button size="is-medium" type="is-light" style="width:100%;" @click="activeTab = 1, motivo='Venta de productos ilegales o regulados'"> Venta de productos ilegales o regulados</b-button>
                            <b-button size="is-medium" type="is-light" style="width:100%;" @click="activeTab = 1, motivo='Bullying o acoso'"> Bullying o acoso</b-button>
                            <b-button size="is-medium" type="is-light" style="width:100%;" @click="activeTab = 1, motivo='Suicidio o autolesiones'"> Suicidio o autolesiones </b-button>
                            <b-button size="is-medium" type="is-light" style="width:100%;" @click="activeTab = 1, motivo='Informacion falsa'"> Información falsa </b-button>
                        </div>
                </b-tab-item>
                <b-tab-item value="1" visible="false">
                      <span id='backIcon' @click="activeTab = 0"> <font-awesome-icon icon="fa-regular fa-arrow-alt-circle-left fa-2xl" style="position:absolute; top: 7px; left: 15px;font-size: 25px; 
            padding: 10px 10px; cursor:pointer; z-index:999;"/></span>
                            <div class="label">
                                <label style="font-weight:bold; text-align:center; self-align:center; font-family:Roboto, Helvetica, Arial, sans-serif; font-size:1.5rem;" > ¿Por qué quieres denunciar esta publicación? </label>
                            </div>
                            <div class="ventana-reportes">
                            
                                <label style="font-size: 20px; color: rgba(0, 0, 0, 0.7);"> {{this.motivo}} </label>
                                <b-input maxlength="200"  placeholder="Escribe el motivo de tu reporte" type="textarea" style="width: 400px;"></b-input>  
                                <b-button size="is-medium" type="is-light" style="width:100%; " @click="activeTab = 2"> Enviar </b-button>
                                
                            </div>
                    </b-tab-item>

                    <b-tab-item value="2" visible="false">
                            <!-- <div class="label">
                            </div> -->
                            <div class="ventana-gracias">
                                <label style="font-weight:bold; width: 100%; text-align:center; self-align:center; text-align:center; font-family:Roboto, Helvetica, Arial, sans-serif; font-size:1.5rem;" > Gracias por informarnos </label>

                                <label style="font-size: 20px; color: rgba(0, 0, 0, 0.7); text-align:center;"> Tus comentarios son importantes para ayudarnos a conseguir que la comunidad de ErasmusConnect siga siendo un lugar seguro </label>
                            </div>
                                <b-button size="is-medium" type="is-light" style="width:100%; " @click="showModal = 0, activeTab=0"> Aceptar </b-button>

                    </b-tab-item>
            </b-tabs>

            </div>
        </div>
  </section>
</template>

<script>
  export default {
    // props: ['post'],
    props: {
      post: Object,
      comment: Boolean,
      view: String
    },

    data() {
      return {
        showModal:0,
        activeTab: 0,
        motivo: null,
        // Variable que controla si se ha guardado una publicación
        saved: false,
        // Variable que controla si se ha dado me gusta una publicación
        liked: false,
        postTags: [
          {name: "comida"},
          {name: "fiesta"},
          {name: "noche"}
        ],
        optionsData: [
          {id: 1, title: "Me gusta", data: this.post.likes},
          {id: 2, title: "Comentarios", data: this.post.comments},
          {id: 3, title: "Compartir", data: 0},
          {id: 4, title: "Reportar", data: 0}
        ],
        user: {},
        postProp: this.post,
      }
    },

    watch: {

    },

    computed: {
      imgUrl() {
        return "/storage/images/posts/" + this.post.img_url;
      },
      imgProfile() {
        return "/images/users/" + this.user.img_url;
      }
    },

    methods: {
      showInput(){
          if (reportForm.style.display !== "none") {
            reportForm.style.display = "none";
       
          } else {
  
            reportForm.style.display = "block";
          }
      },
      getUser() {
        axios.get(`/api/users/` + this.post.user_id).then(response => {
          this.user = response.data.user;
          console.log(this.user);
        }).catch(error => {
          console.info(error);
        });
      },
      reaction(option, isComment) {
        if (!isComment) {
          if(option == 0) {
            console.log("Guardando post...")
            // TODO: Falta hacer el cambio en la base de datos para que el cambio sea persistente
            if(!this.saved) {
              this.saved = true
            }
            else {
              this.saved = false
            }
          }
          else if(option == 1) {
            console.log("Dando me gusta a post...")
            // var element = document.getElementById("select-option-" + option);
            // TODO: Falta hacer el cambio en la base de datos para que el cambio sea persistente
            if(!this.liked) {
              // element.classList.add("liked");
              this.liked = true
            }
            else {
              // element.classList.remove("liked");
              this.liked = false
            }
          }
        }
        else {
          if(option == 1) {
            console.log("Dando me gusta a comentario...")
            // var element = document.getElementById("select-comment-option-" + option);
            // TODO: Falta hacer el cambio en la base de datos para que el cambio sea persistente
            if(!this.liked) {
              // element.classList.add("liked");
              this.liked = true
            }
            else {
              // element.classList.remove("liked");
              this.liked = false
            }
          }
        }

      }
    },


    mounted() {
      
    },

    created() {
      setTimeout(() => {
        this.getUser();
      }, 1000)
    }
  }
</script>

<style>
.tabs li.is-active a {
    border-bottom-color: transparent !important;
    color: transparent !important;
}

.tabs li.is-active a {
    border-bottom-color: transparent;
    color: transparent;
}

.tabs li.is-active a {
    border-bottom-color: transparent;
    color: transparent;
}

.tabs a {
  border-bottom-style: none;
}
.tabs ul {
  border-bottom-style: none;
}

.select select:focus, .taginput .taginput-container.is-focusable:focus, .textarea:focus, .input:focus, .select select.is-focused, .taginput .is-focused.taginput-container.is-focusable, .is-focused.textarea, .is-focused.input, .select select:active, .taginput .taginput-container.is-focusable:active, .textarea:active, .input:active, .select select.is-active, .taginput .is-active.taginput-container.is-focusable, .is-active.textarea, .is-active.input {
    border-color: #00309a;
    -webkit-box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
    box-shadow: 0 0 0 0.125em rgb(121 87 213 / 25%);
}

</style>
<style lang="scss" scoped>
$blue: #00309a;
// Necesario para que el comentario ocupe todo el ancho
.comment-option {
  display:flex;
  align-items: center;
  color: #000;
}

.comment-option:hover {
  color: $blue;
}

.comment {
  max-width: none !important;
}
.title-save {
  display:flex;
  justify-content: space-between;
}

// Clase para cambiar el color al botón de me gusta
.liked {
  color: #f91880;
}

// Hovers de las opciones de una publicación
// Botón de guardar
#select-option-0:hover #background-option-0 {
  -webkit-transition: background-color 0.3s ease;
  border-radius: 80px;
  background-color: rgb(218, 218, 218);
  z-index: 0;
}
// Botón de dar me gusta
#select-option-1:hover #background-option-1 {
  -webkit-transition: background-color 0.3s ease;
  border-radius: 50px;
  background-color: rgb(249, 24, 128, 0.2);
  z-index: 0;
}
// Botón de comentarios
#select-option-2:hover #background-option-2 {
  -webkit-transition: background-color 0.3s ease;
  border-radius: 50px;
  background-color: rgb(0, 48, 154, 0.2);
  z-index: 0;
}
// Botón de compartir
#select-option-3:hover #background-option-3 {
  -webkit-transition: background-color 0.3s ease;
  border-radius: 80px;
  background-color: rgb(218, 218, 218);
  z-index: 0;
}

#select-option-4:hover #background-option-4 {
  -webkit-transition: background-color 0.3s ease;
  border-radius: 80px;
  background-color: rgb(218, 218, 218);
  z-index: 0;
}

.tag-3 {
  margin-left: auto;
  padding-right: 0 !important;
}

#select-option {
  &-0:hover {
    cursor: pointer;
  }
  &-1:hover {
    cursor: pointer;
    color: #f91880;
    z-index: 1
  }
  &-2:hover {
    cursor: pointer;
    color:$blue;
  }
  &-3:hover {
    cursor: pointer;
  }
}
// Hovers de las opciones de un comentario
// Botón de dar me gusta (comentario)
#select-comment-option-1:hover #background-comment-option-1 {
  -webkit-transition: background-color 0.3s ease;
  border-radius: 50px;
  background-color: rgb(249, 24, 128, 0.2);
  z-index: 0;
}

#select-comment-option {
  &-1:hover {
    cursor: pointer;
    color: #f91880;
    z-index: 1
  }
}
#tags {
  margin: 10px 0;
}
#unique {
  max-width: 900px;
}

.modal-vue .overlay {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
}

.modal-vue .modal {
    display: flex;
    position: fixed !important;
    border-radius: 50px;
    z-index: 9999;
    width: 550px;
    margin: 16% auto;
    height: 500px;
    flex-flow: column no-wrap;
    justify-content: flex-start;
    overflow: auto;
    margin-top: 6%;
}

#clickableAwesomeFont {
    cursor: pointer;
    position: absolute;
    display:block;
    top: 7px;
    right: 15px;
    font-size: 25px; 
    padding: 10px 10px;
    z-index: 9999;
}

#clickableAwesomeFont:hover{
  -webkit-transition: background-color 0.3s ease;
  border-radius: 50px;
  background-color: rgb(218, 218, 218);
  z-index: 999;
}

.ventana-reportes{
  display:flex;
  flex-flow: column wrap;
  align-items: center;
  justify-content: space-between;
  min-height:340px;
}

.ventana-gracias{
  min-height:370px;
  display:flex;
  flex-flow: column wrap;
  align-items: center;
  justify-content: center;
}
</style>