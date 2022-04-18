<template>
  <section class="main-vp-publicacion" :id="view">
    <div class="centered-container">

      <a href="/publicacion" style="color:black;" title="Ver publicación" v-if='view == ""'>
        <div class="content-main" v-if="!comment">
          <img :src="imgUrl" alt="Foto" width="100%" height="auto">
        </div>
      </a>
      <div class="content-main" v-if="view == 'unique'">
        <img :src="imgUrl" alt="Foto" width="100%" height="auto">
      </div>
      <div class="information">
          <div class="information-personal-title title-save" v-if="!comment">
            <p>{{ post.title }}</p>
            <div class="information-options-option tag-0" id="select-option-0" @click="reaction(0)">
              <div id="background-option-0" style="padding: 0 10px;">
                <font-awesome-icon icon="fa-regular fa-bookmark" style="font-size: 25px; padding: 4px 4px;" title="Guardar"
                v-if="saved == false"/>
                <font-awesome-icon icon="fa-solid fa-bookmark" style="font-size: 25px; padding: 4px 4px;" title="Quitar de guardados"
                v-if="saved == true"/>
              </div>
            </div>
          </div>
          <div class="information-personal">
            <div class="information-personal-img">
              <img :src="imgProfile" alt="Profile image">
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
          <div class="information-options" v-if="comment">
              <div class="information-options-option" v-for="(option, index) in optionsData" :key="index">
                <font-awesome-icon icon="fa-regular fa-heart" style="font-size: 30px" title="Me gustas"
                v-if="index == 0"/>
                <div class="information-options-option-data" v-if="index == 0">
                  <!-- <strong>{{ option.title }}</strong> -->
                  <p>{{ option.data }}</p>
                </div>
              </div>
          </div>
          <div class="information-options" v-if="!comment">
            <div :class="'information-options-option tag-' + option.id" :id="'select-option-' + option.id"
            v-for="(option, index) in optionsData" :key="index" @click="reaction(option.id)">
              <div :id="'background-option-' + option.id">
                <font-awesome-icon icon="fa-regular fa-heart" style="font-size: 25px; padding: 4px 4px;" title="Me gusta"
                v-if="index == 0 && liked == false"/>
                <font-awesome-icon icon="fa-solid fa-heart" style="font-size: 25px; padding: 4px 4px;" title="Ya no me gusta"
                v-if="index == 0 && liked == true"/>
                <font-awesome-icon icon="fa-regular fa-comment" style="font-size: 25px; padding: 4px 4px;" title="Comentarios"
                v-if="index == 1"/>
                <font-awesome-icon icon="fa-solid fa-share-nodes" style="font-size: 25px; padding: 4px 4px; padding: 10px 10px;" title="Compartir"
                v-if="index == 2" />
              </div>
              <div class="information-options-option-data" v-if="index != 2 && liked == false">
                <!-- <strong>{{ option.title }}</strong> -->
                <p>{{ option.data }}</p>
              </div>
              <div class="information-options-option-data" v-if="index != 2 && liked == true">
                <!-- <strong>{{ option.title }}</strong> -->
                <p>{{ option.data }}</p>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      post: Object,
      comment: Boolean,
      view: String
    },

    data() {
      return {
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
          // {image: "/images/like.svg", title: "Me gusta", data: this.post.likes},
          // {image: "/images/comment.svg", title: "Comentarios", data: 152},
          // {image: "/images/share.svg", title: "Compartir", data: 56}
          {id: 1, data: this.post.likes},
          {id: 2, data: 152},
          {id: 3, data: 56}
        ],
        user: {},
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
      imgUrl() {
        return "/images/" + this.post.img_url;
      },
      imgProfile() {
        return "/images/users/" + this.user.img_url;
      }
    },

    methods: {
      getUser() {
        axios.get(`/api/users/` + this.post.user_id).then(response => {
          this.user = response.data.user;
          console.log(this.user);
        }).catch(error => {
          console.info(error);
        });
      },
      reaction(option) {
        if(option == 0) {
          console.log("Guardando post...")
          // TODO: Falta hacer el cambio en la base de datos para que el cambio sea persistente
          if(this.saved == false) {
            this.saved = true
          }
          else {
            this.saved = false
          }
        }
        else if(option == 1) {
          console.log("Dando me gusta a post...")
          var element = document.getElementById("select-option-" + option);
          // TODO: Falta hacer el cambio en la base de datos para que el cambio sea persistente
          if(this.liked == false) {
            element.classList.add("liked");
            this.liked = true
          }
          else {
            element.classList.remove("liked");
            this.liked = false
          }
        }
      }
    },

    mounted() {},

    created() {
      this.getUser();
    }
  }
</script>
<style lang="scss" scoped>
$blue: #00309a;
.title-save {
  display:flex;
  justify-content: space-between;
}
.tag-3 {
  margin-left: auto;
  padding-right: 0 !important;
}

#select-option-0:hover #background-option-0 {
  -webkit-transition: background-color 0.3s ease;
  border-radius: 80px;
  background-color: rgb(218, 218, 218);
  z-index: 0;
}

#select-option-1:hover #background-option-1 {
  -webkit-transition: background-color 0.3s ease;
  border-radius: 50px;
  background-color: rgb(249, 24, 128, 0.2);
  z-index: 0;
}

.liked {
  color: #f91880;
}

#select-option-2:hover #background-option-2 {
  -webkit-transition: background-color 0.3s ease;
  border-radius: 50px;
  background-color: rgb(0, 48, 154, 0.2);
  z-index: 0;
}
#select-option-3:hover #background-option-3 {
  -webkit-transition: background-color 0.3s ease;
  border-radius: 80px;
  background-color: rgb(218, 218, 218);
  z-index: 0;
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
#tags {
  margin: 10px 0;
}
#unique {
  max-width: 900px;
}
</style>