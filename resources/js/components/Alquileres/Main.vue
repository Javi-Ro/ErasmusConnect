<template>
  <section class="alquileres-container" style="background-color:whitesmoke; width:100%; height:940px">
    <filter-bar-alquiler v-model="minPrice"></filter-bar-alquiler>
    <filter-bar-horizontal-alquiler></filter-bar-horizontal-alquiler>
    <input style="position:fixed; top:150px" v-model="minPrice">
    <div style="position:fixed; top:200px">{{minPrice}}</div> 
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        minPrice: 0
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