<template>
  <section>
        <b-field label="Título" >
            <b-input maxlength="200">></b-input>
        </b-field>
  </section>

</template>

<style lang="scss" scoped>
  section{
    margin-top: 230px;
    display:flex;
    justify-content: center;
  }
</style>

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