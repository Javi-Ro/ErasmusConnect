<template>
  <section class="post-container">
    <filter-bar></filter-bar>
    <filter-bar-horizontal class="horizontal-menu"></filter-bar-horizontal>
    <div class="title-bar">
      <div class="title-bar-img">
        <img src="images/arrow-left.svg" alt="Arrow left" width="14px" height="11px" @click="goBack();">
      </div>
      <p>Publicación</p>
    </div>
    <vista-previa-publicacion class="post" :post="post"></vista-previa-publicacion>
    <div class="post-comment">
      <b-input class="post-comment-input" placeholder="Comenta..." rounded></b-input>
      <p class="post-comment-send" @click="sendComment()">Publicar</p>
    </div>
    
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
          post: { id: 1, title: "Aquí en Eslovaquia", text: "Hola buienas ocmo estas y tu bien y yo de locos nene.", img_url: 'ejemplo-praga.jpeg', user_id:1, likes:15 , created_at: '2022-04-03 17:47:11'}
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