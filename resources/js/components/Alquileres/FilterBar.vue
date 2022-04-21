<template>
  <section class="filter-container">
    <div class="filter-header">
      <p>Filtra a tu gusto</p>
    </div>
    <div class="filter-options">
      <div class="filter-options-price">
        <p class="filter-options-price-tag">Price</p>
        <b-field>
          <b-slider v-model="numbers" :min="1" :max="15" :step="0.5" ticks lazy></b-slider>
        </b-field>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        numbers: [0, 0],
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

<style lang="scss" scoped>
  .filter-container{
    position:fixed;
    top: 150px;
  }
</style>