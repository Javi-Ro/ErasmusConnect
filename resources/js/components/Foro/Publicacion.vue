<template>
  <section class="post-container">
    <div class="post-container-positioned">
      <div class="title-bar">
        <div class="title-bar-img">
          <!-- <img src="images/arrow-left.svg" alt="Arrow left" width="14px" height="11px" @click="goBack();"> -->
          <div @click="goBack()">
            <font-awesome-icon icon="fa-solid fa-arrow-left" width="14px" height="11px"/>
          </div>
        </div>
        <div>
          <p>Volver al foro</p>
        </div>
      </div>
      <vista-previa-publicacion :post="post" :comment="false"></vista-previa-publicacion>
      <div class="comments-container">
        <div class="post-comment">
          <img src="images/placeholders/default-profile-img.jpeg" class="comment-img" alt="" style="margin-right: 10px">
          <b-input class="post-comment-input" placeholder="Comenta..." rounded></b-input>
          <b-button class="information-personal-data-main-button" type="is-link" @click="sendComment()">Publicar</b-button>
        </div>
        <vista-previa-publicacion :post="post" :comment="true"></vista-previa-publicacion>
        <comentario></comentario>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
    },

    data() {
      return {
          post: { id: 1, title: "Aquí en Praga", text: "Praga es una de las ciudades mas bonitas que he conocido.", img_url: 'ejemplo-praga.jpeg', user_id:1, likes:15 , created_at: '2022-04-03 17:47:11'}
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

      }
    },

    mounted() {}
  }
</script>
<style>
.post-comment {
  margin: 0 0 10px 0;
}
</style>