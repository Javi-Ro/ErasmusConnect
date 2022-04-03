<template>
    <section style="margin-top: 130px;">
        
    HOLA
    </section>    

</template>

<style lang="scss" scoped>
    section{
        background-color:blue;
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