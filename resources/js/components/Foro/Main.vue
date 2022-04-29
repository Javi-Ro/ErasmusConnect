<template>
  <section class="main-foro"> 
    <filter-bar></filter-bar>
    <right-bar></right-bar>
    <filter-bar-horizontal></filter-bar-horizontal>

    <div class="posts">
       <div class="searcher">
       </div>
    </div>

    <div v-if="postsReady === true" class="posts">
      <!-- <div class="searcher">
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

      <rightBar @post-buscar="capturaBusqueda"/> -->

      <div v-for="post in buscar" :key="post.id" class="post" id="postContainer">
        <vista-previa-publicacion :post="post" :comment="false" view="">></vista-previa-publicacion>
      </div>
    </div>
    <a href="/foro/crear" class="float" title="Publicar">
      <font-awesome-icon icon="fa-solid fa-plus" class="my-float" style="width:25px; height:25px"/>
    </a>
  </section>
</template>

<script>
  import rightBar from "./rightBar.vue";

  export default {
    components: { rightBar },
    name: "Main",
    props: {},

    data() {
      return {
        buscador: '',
        users: [],
        postsBuscar: [],
        try: [],
        postsReady: false,
        posts: [],
      }
    },

    watch: {
      allOrFilteredCities() {
      }
    },

    computed: {
      buscar() {
        let posts = this.posts.filter((item) => item.title.toLowerCase().indexOf(this.buscador.toLowerCase()) >= 0 || item.text.toLowerCase().indexOf(this.buscador.toLowerCase()) >= 0 );

        return this.$root.city == -1 ? posts : posts.filter((item) => item.city_id == this.$root.city);
      },
    },

    methods: {
      getPosts() {
        axios.get(`/api/posts`).then(response => {
            this.posts = response.data.posts;
            this.postsReady = true;
        }).catch(error => {
            console.info(error.response.data);
        });
      },
      //capturaBusqueda(buscado) {
      //  this.posts = buscado;
      //},
    },

    mounted() {
      //
    },
    
    created() {
      this.getPosts();
    }
  }
</script>
<style lang="scss" scoped>
.float{
  display: flex;
	position:fixed;
	width:70px;
	height:70px;
	bottom:40px;
	right:40px;
	background-color:#00309a;
	color:#F2AF13;
	border-radius:50px;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top: 22px;
  margin-left: 22px
}
@media(min-width: 1500px) {
  .float{
    display: none;
  }
}

@media(max-width: 500px){
  .posts {
    margin-top: 128px;
  }
}

</style>