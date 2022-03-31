<template>
  <section class="main-vp-publicacion">
    <div class="centered-container">
      <div class="content-main">
        <img src="/images/foto-ejemplo.jpg" alt="Foto berlín" width="100%" height="auto">
      </div>
      <div class="information">
          <div class="information-personal">
            <div class="information-personal-img">
              <img src="/images/profile.svg" alt="Profile image">
            </div>
            <div class="information-personal-data">
              <div class="information-personal-data-main">
                <p class="information-personal-data-main-user">Jorge Martínez</p>
                <b-button class="information-personal-data-main-button" type="is-link" outlined>Guardar</b-button>
              </div>
              <div class="information-personal-data-date">
                <p>15/10/2001</p>
              </div>
            </div>
          </div>
          <div class="information-description">
            <p>
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
            </p>
          </div>
          <div class="information-options">
            <div class="information-options-option" v-for="(option, index) in optionsData" :key="index">
              <img :src="option.image" :alt="option.title" width="25px" height="25px">
              <div class="information-options-option-data">
                <strong>{{option.title}}</strong>
                <p>{{option.data}}</p>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        optionsData: [
          {image: "/images/like.svg", title: "Me gusta", data: 1350},
          {image: "/images/comment.svg", title: "Comentarios", data: 152},
          {image: "/images/share.svg", title: "Compartir", data: 56}
        ]
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

    methods: {},

    mounted() {}
  }
</script>