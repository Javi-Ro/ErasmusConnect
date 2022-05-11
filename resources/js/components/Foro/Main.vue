<template>
  <section class="main-foro"> 
    <filter-bar></filter-bar>
    <right-bar></right-bar>
    <filter-bar-horizontal></filter-bar-horizontal>

    <!-- <div v-if="postsReady === true" class="posts"> -->
      <!-- <div class="searcher">
    <div class="posts"> -->
      
      <!--
      <rightBar @post-buscar="capturaBusqueda"/> -->

      <!--<div v-for="post in buscar" :key="post.id" class="post" id="postContainer">
        <vista-previa-publicacion :post="post" :comment="false" view="">></vista-previa-publicacion>
      </div>-->

    <!-- </div> -->

    <div>
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
      <b-tabs position="is-centered" style="display:block !important" animation="none" type="is-boxed">
          <b-tab-item label="Descubrir" icon="fa-thin fa-globe" icon-pack="fa">
              <div v-if="postsReady === true" class="posts">
                <div v-for="post in buscar" :key="post.id" class="post" id="postContainer">
                  <vista-previa-publicacion :post="post" :comment="false" view="">></vista-previa-publicacion>
                </div>
              </div>
          </b-tab-item>
          <b-tab-item label="Siguiendo" icon="fa-solid fa-users" icon-pack="fa" >
            <div v-if="followingPostsReady === true" class="posts">
              <div v-for="post in buscarFollowing" :key="post.id" class="post" id="postContainer">
                <vista-previa-publicacion :post="post" :comment="false" view="">></vista-previa-publicacion>
              </div>
            </div>
            <div v-if="buscarFollowing == false" class="pagina-vacia" > 
              <label class="titulo-vacio" > Parece que no hay nada por aquí</label> 
              <br>
              <label class="subtitulo-vacio"> Visita el 
                <a href="/foro" style="color:#00309a;"> foro </a>
              </label> 
            </div>
          </b-tab-item>
          <div v-if="buscar == false" class="pagina-vacia" > 
            <label class="titulo-vacio"> Parece que no hay nada por aquí</label> 
            <br>
            <label class="subtitulo-vacio"> Sé el primero en <a href="/foro/crear" style="color:#00309a;"> publicar </a></label> 
        </div>

      </b-tabs>
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
        postsFollowing: [],
        try: [],
        postsReady: false,
        followingPostsReady: false,
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
      buscarFollowing() {
        let posts = this.postsFollowing.filter((item) => item.title.toLowerCase().indexOf(this.buscador.toLowerCase()) >= 0 || item.text.toLowerCase().indexOf(this.buscador.toLowerCase()) >= 0 );

        return this.$root.city == -1 ? posts : posts.filter((item) => item.city_id == this.$root.city);
      }
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
      getPostsFollowing() {
        axios.get(`/api/posts/following`).then(response => {
            console.log(response);
            this.postsFollowing = response.data.posts;
            this.followingPostsReady = true;
        }).catch(error => {
            console.info(error.response.data);

            if (error.response.status === 403) {
              console.info("Loggeate primero!")
            }
        });
      }
      //capturaBusqueda(buscado) {
      //  this.posts = buscado;
      //},
    },

    mounted() {
      //
    },
    
    created() {
      this.getPosts();
      this.getPostsFollowing();
    }
  }
</script>
<style lang="scss">
.titulo-vacio{
  font-size: 2rem;
  font-weight: bold;
  text-align: center;
}
.subtitulo-vacio{
  font-size: 22px;
  width: 100%;
  text-align: center;
}
@media(max-width: 500px){
  .titulo-vacio{
    font-size: 1.8rem;
  }
  .subtitulo-vacio{
    margin-top: 10px;
    font-size: 18px;
  }
}
.tabs{
  height: fit-content !important;
}
.tabs ul{
  border-bottom: 1px solid #dbdbdb !important;
  height: fit-content;
}

.b-tabs .tab-content{
  padding: 0;
  padding-top: 3rem !important; 
}
.tabs ul {
  border-bottom-style: solid;
}
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
.float:hover {
  background-color:#002779;
}

.my-float{
	margin-top: 22px;
  margin-left: 22px
}

.searcher {
  margin-bottom: 1em;
}

@media(min-width: 1500px) {
  .float{
    display: none;
  }
}
@media(max-width: 1500px){
  .b-tabs .tabs{
    margin-top: 70px;
  }
}

@media(max-width: 500px){
  .posts {
    //margin-top: 128px;
  }
  .b-tabs .tabs{
    margin-top: 110px;
  }

  .pagina-vacia{

  }
}

.pagina-vacia{
  margin-top: 128px;
  height: calc(100vh - 128px);
}

</style>