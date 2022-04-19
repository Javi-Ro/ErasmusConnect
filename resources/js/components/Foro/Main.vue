<template>
  <section class="main-foro"> 
    <filter-bar></filter-bar>
    <filter-bar-horizontal></filter-bar-horizontal>
    <div class="posts">
      <div class="searcher">
        <b-field>
            <b-input placeholder="Buscar en el foro..."
                type="search"
                icon="magnify"
                icon-clickable
                v-model="buscador"
                
                >
            </b-input>
        </b-field>
      </div>
      <div v-for="post in buscar" :key="post.id" class="post" id="postContainer">
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
        posts: [],
        buscador: '',
        postsBuscar: [],
        try: []
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

    computed: {
      buscar() {
        return this.posts.filter((item) => item.title.toLowerCase().indexOf(this.buscador.toLowerCase()) >= 0 || item.text.toLowerCase().indexOf(this.buscador.toLowerCase()) >= 0 );
      },
    },

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