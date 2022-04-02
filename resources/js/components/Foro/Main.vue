<template>
  <section class="main-foro"> 
    <filter-bar></filter-bar>
    <filter-bar-horizontal></filter-bar-horizontal>
    <div class="posts">
      <div v-for="post in posts" :key="post.id" class="post">
        <vista-previa-publicacion :post="post"></vista-previa-publicacion>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        posts: []
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
      getPosts() {
        axios.get(`/api/posts`).then(response => {
            this.posts = response.data.posts;
        }).catch(error => {
            console.info(error);
        })
      },
    },

    mounted() {},
    
    created() {
      this.getPosts();  
    }
  }
</script>