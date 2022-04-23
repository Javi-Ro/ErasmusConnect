<template>
  <section v-if="data === true" class="post-container">
    <div class="post-container-positioned">
      <filter-bar></filter-bar>
      <filter-bar-horizontal class="horizontal-menu"></filter-bar-horizontal>
      <div class="title-bar">
        <div class="title-bar-img">
          <!-- <img src="images/arrow-left.svg" alt="Arrow left" width="14px" height="11px" @click="goBack();"> -->
          <div @click="goBack()">
            <font-awesome-icon icon="fa-solid fa-arrow-left" width="14px" height="11px"/>
          </div>
        </div>
        <p>Publicación</p>
      </div>
      <vista-previa-publicacion v-if="Object.entries(post).length!==0" class="post" :post="post"></vista-previa-publicacion>
      <div class="comments-container">
        <div class="post-comment">
          <img :src="userImg" class="comment-img" alt="" style="margin-right: 10px">
          <b-input class="post-comment-input" placeholder="Comenta..." v-model="comment.text" rounded></b-input>
          <b-button class="information-personal-data-main-button" type="is-link" @click="sendComment()">Publicar</b-button>
        </div>
        <div class="comentarios" v-if="commentsReady === true">
          <div class="comentario" v-for="comment in comments" :key="comment.id">
            <comentario :comment="comment"></comentario>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Comentario from './Comentario.vue';
  export default {
  components: { Comentario },
    props:{id: null},

    data() {
      return {
        comments: [{id: null}],
        commentsReady: false,
        data: false,
        post: {},
        user: {},
        auth: false,
        comment: {
          text: ''
        }
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
      userImg() {
        return "/storage/images/users/" + (this.auth === true ? this.user.img_url : "default-profile-img.jpeg");
      }
    },

    methods: {
      goBack(){
        window.location.href = "/foro";
      },
      sendComment(){
        axios.post(`/api/posts/` + this.id, this.comment).then(response => {
          console.log(response.data);
          this.comment.text = "";
          this.getComments();
        }).catch(error => {
          console.info(error.response.data);
          if (error.response.status == 403) {
            window.location.href = "/login?redirectTo=" + window.location.href;
          } else if (error.response.status == 422) {
            alert("El comentario no puede estar vacio!");
          }
        });
      },
      getPostById(){
        axios.get('/api/posts/' + this.id).then(response => {
            this.post = response.data.post;
            this.data = true;
          }).catch(error => {
            console.info(error);
          });
      },
      getComments() {
        axios.get('/api/posts/'+ this.id +'/comments').then(response => {
            this.comments = response.data.comments;
            this.commentsReady = true;
          }).catch(error => {
            console.info(error);
          });
      },
      getPost() {
        return this.post;
      },
      getAuthUser() {
        axios.get(`/api/auth`).then(response => {
          this.user = response.data.user;
          this.auth = response.data.auth;
        }).catch(error => {
          console.info(error.response.data);
        });
      }
    },

    mounted() {
      this.getAuthUser();
      this.getPostById();
      this.getComments();
    },

    created() {

    }
  }
</script>