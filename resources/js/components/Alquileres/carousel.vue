
<template>
    <b-carousel :indicator-inside="false" :autoplay="false">
        <b-carousel-item v-for="(item, i) in 6" :key="i">
            <b-image class="image" :src="getImgUrl(i)"></b-image>
        </b-carousel-item>
        <template #indicators="props">
            <b-image class="al image" :src="getImgUrl(props.i)" :title="props.i"></b-image>
        </template>
    </b-carousel>
</template>

<script>
import VistaPreviaAlquiler from './VistaPreviaAlquiler.vue'
    export default {
  components: { VistaPreviaAlquiler },
        data() {
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
          getImgUrl(value) {
            return `https://picsum.photos/id/43${value}/1230/500`
          }
        },

        created() {
            
        }
    }
</script>

<style lang="scss" scoped>
    
</style>