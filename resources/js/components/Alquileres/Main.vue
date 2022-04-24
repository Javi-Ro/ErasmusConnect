<template>
  <section class="alquileres-container" style="background-color:whitesmoke; width:100%; height:940px">
    <filter-bar-alquiler v-model="filters"></filter-bar-alquiler>
    <filter-bar-horizontal-alquiler v-model="filters"></filter-bar-horizontal-alquiler>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        filters: {
          minPrice: 0,
          maxPrice: 0,
          habitaciones: 0,
          metros: 0,
          rate: 0
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

    computed: {},

    methods: {},

    mounted() {}
  }
</script>