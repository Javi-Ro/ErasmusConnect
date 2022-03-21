<template>
  <section class="main-vp-publicacion">
    <div class="centered-container">
      <div class="content-main">

      </div>
      <div class="information">
          <div class="information-personal">
            <div class="information-personal-img">
              <img src="images/profile.svg" alt="Profile image">
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

          </div>
          <div class="information-options">

          </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {}
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