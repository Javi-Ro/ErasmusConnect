<template>
  <section class="post-container">
    <div class="post-container-positioned">
      <filter-bar></filter-bar>
      <filter-bar-horizontal class="horizontal-menu"></filter-bar-horizontal>
      <div class="title-bar">
        <div class="title-bar-img">
          <img src="images/arrow-left.svg" alt="Arrow left" width="14px" height="11px" @click="goBack();">
        </div>
        <p>Publicación</p>
      </div>
      <vista-previa-publicacion class="post" :post="post"></vista-previa-publicacion>
      <div class="comments-container">
        <div class="post-comment">
          <b-input class="post-comment-input" placeholder="Comenta..." rounded></b-input>
          <p class="post-comment-send" @click="sendComment()">Publicar</p>
        </div>
        <div class="comentario" v-for="(comment) in comments" :key="comment.id">
          <div class="imagen">
            {{post.img_url}}
          </div>
          <div class="nickname">
            {{post.user_id}}
          </div>
          <div class="comentario">
            {{post.title}}
          </div>
          <div class="likes">
            {{post.likes}}
          </div>
          <div class="boton me gusta">

          </div>
        </div>
        <comentario></comentario>
        <comentario></comentario>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        post: Object,
        comments: []
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
        axios.get('/api/posts/1').then(response => {
            console.log(response.data.post);
            this.post = response.data.post;
          }).catch(error => {
            console.info(error);
          })
      },
      getComments() {
        this.comments = this.post.comments();
      }
    },

    mounted() {},

    created() {
      this.getPostById()
    }
  }
</script>