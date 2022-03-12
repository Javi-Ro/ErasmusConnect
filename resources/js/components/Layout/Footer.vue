<template>
  <footer class="footer-container">
    <div class="footer-container-main">
      <div class="footer-container-img">
          <img src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png" width="100px">
      </div>
      <div class="footer-container-slogan">
          Boost your erasmus life.
      </div>
    </div>
    <div class="footer-container-rights">
      <p>© 2022 erasmusconnect.com. All Rights Reserved.</p>
    </div>
    
  </footer>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
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