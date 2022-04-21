<template>
  <section class="post-container">
    <div class="post-container-positioned">
      <div class="title-bar">
        <div class="title-bar-img">
          <img src="/images/arrow-left.svg" alt="Arrow left" width="14px" height="11px" @click="goBack();">
          <!-- <img src="images/arrow-left.svg" alt="Arrow left" width="14px" height="11px" @click="goBack();"> -->
          <div @click="goBack()">
            <font-awesome-icon icon="fa-solid fa-arrow-left" width="14px" height="11px"/>
          </div>
        </div>
        <div>
          <p>Volver al foro</p>
        </div>
      </div>
      <vista-previa-publicacion v-if="Object.entries(post).length!==0" class="post" :post="post" 
      :comment="false" view="unique"></vista-previa-publicacion>
      <div class="comments-container">
        <div class="post-comment">
          <img src="images/placeholders/default-profile-img.jpeg" class="comment-img" alt="" style="margin-right: 10px">
          <b-input class="post-comment-input" size="is-medium" placeholder="Comenta tu respuesta..." rounded></b-input>
          <b-button class="information-personal-data-main-button" type="is-link" @click="sendComment()">Comentar</b-button>
        </div>
        <div class="comentarios" v-if="data">
          <div class="comentario" v-for="comment in comments" :key="comment.id">
            <vista-previa-publicacion :post="comment" :comment="true"></vista-previa-publicacion>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props:{post: Object},

    data() {
      return {
        comments: [{id: null}],
        data: false
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
      goBack(){
        window.location.href = "/foro";
      },
      sendComment(){
        axios.post('/api/posts').catch(error => {
          console.info(error);
        })
      },
      getPostById(){
        axios.get('/api/posts/' + this.post.id).then(response => {
            this.post = response.data.post;
          }).catch(error => {
            console.info(error);
          })
      },
      getComments() {
        axios.get('/api/posts/'+ this.post.id +'/comments').then(response => {
            this.comments = response.data.comments;
            this.data = true;
          }).catch(error => {
            console.info(error);
          })
      },
      getPost() {
        return this.post;
      }
    },

    mounted() {
      this.getPostById()
      this.getComments()
    },

    created() {

    }
  }
</script>
<style>
.button.is-link:hover {
  color: #F2AF13;
}
.post-comment {
  margin: 0 0 10px 0;
}
</style>