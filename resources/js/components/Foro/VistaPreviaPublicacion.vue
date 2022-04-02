<template>
  <section class="main-vp-publicacion">
    <div class="centered-container">
      <div class="content-main">
        <img :src="imgUrl" alt="Foto" width="100%" height="auto">
      </div>
      <div class="information">
          <div class="information-personal-title">
            {{ post.title }}
          </div>
          <div class="information-personal">
            <div class="information-personal-img">
              <img :src="imgProfile" alt="Profile image">
            </div>
            <div class="information-personal-data">
              <div class="information-personal-data-main">
                <p class="information-personal-data-main-user">{{ user.nickname }}</p>
                <b-button class="information-personal-data-main-button" type="is-link" outlined>Guardar</b-button>
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
          <div class="information-options">
            <div class="information-options-option" v-for="(option, index) in optionsData" :key="index">
              <img :src="option.image" :alt="option.title" width="25px" height="25px">
              <div class="information-options-option-data">
                <strong>{{ option.title }}</strong>
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
      post: Object
    },

    data() {
      return {
        optionsData: [
          {image: "/images/like.svg", title: "Me gusta", data: 1350},
          {image: "/images/comment.svg", title: "Comentarios", data: 152},
          {image: "/images/share.svg", title: "Compartir", data: 56}
        ],
        user: Object,
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
        return "images/users/" + this.user.img_url;
      }
    },

    methods: {},

    mounted() {},

    created() {
      axios.get(`/api/users/` + this.post.user_id).then(response => {
        this.user = response.data.user;
        console.log(this.user);
      }).catch(error => {
        console.info(error);
      });
    }
  }
</script>