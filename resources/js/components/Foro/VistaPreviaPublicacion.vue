<template>
  <section class="main-vp-publicacion">
    <div class="centered-container">
      <a href="/publicacion" style="color:black;">
      <div class="content-main" v-if="!comment">
        <img :src="imgUrl" alt="Foto" width="100%" height="auto">
      </div>
      </a>
      <div class="information">
          <div class="information-personal-title" v-if="!comment">
            {{ post.title }}
          </div>
          <div class="information-personal">
            <div class="information-personal-img">
              <img :src="imgProfile" alt="Profile image">
            </div>
            <div class="information-personal-data">
              <div class="information-personal-data-main">
                <p class="information-personal-data-main-user">{{ user.nickname }}</p>
                <b-button class="information-personal-data-main-button" type="is-link" outlined v-if="!comment">
                  Guardar
                </b-button>
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
            <div class="information-options-option" v-for="(option, index) in optionsData" :key="index">
              <font-awesome-icon icon="fa-regular fa-heart" style="font-size: 30px" title="Me gustas"
              v-if="index == 0"/>
              <font-awesome-icon icon="fa-regular fa-comment" style="font-size: 30px" title="Comentarios"
              v-if="index == 1"/>
              <font-awesome-icon icon="fa-solid fa-share-nodes" style="font-size: 30px" title="Compartir"
              v-if="index == 2"/>
              <div class="information-options-option-data">
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
      comment: Boolean
    },

    data() {
      return {
        postTags: [
          {name: "comida"},
          {name: "fiesta"},
          {name: "noche"}
        ],
        optionsData: [
          // {image: "/images/like.svg", title: "Me gusta", data: this.post.likes},
          // {image: "/images/comment.svg", title: "Comentarios", data: 152},
          // {image: "/images/share.svg", title: "Compartir", data: 56}
          {data: this.post.likes},
          {data: 152},
          {data: 56}
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
      }
    },

    mounted() {},

    created() {
      this.getUser();
    }
  }
</script>
<style lang="scss" scoped>
#tags {
  margin: 10px 0;
}
</style>