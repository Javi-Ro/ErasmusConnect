<template>
  <section class="main-foro"> 
    <filter-bar></filter-bar>
    <filter-bar-horizontal></filter-bar-horizontal>
    <div class="posts">
      <div class="searcher">
        <b-field>
            <b-input placeholder="Search a profile..."
                type="search"
                icon="magnify"
                icon-clickable
                @icon-click="searchIconClick">
            </b-input>
        </b-field>
      </div>
      <div v-for="post in posts" :key="post.id" class="post" id="postContainer">
        <a href="/publicacion" style="color:black;"><vista-previa-publicacion :post="post"></vista-previa-publicacion></a>
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