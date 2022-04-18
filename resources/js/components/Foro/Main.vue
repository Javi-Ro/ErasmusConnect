<template>
  <section class="main-foro"> 
    <filter-bar></filter-bar>
    <right-bar></right-bar>
    <filter-bar-horizontal></filter-bar-horizontal>
    <div class="posts">
      <!-- <div class="searcher">
        <b-field>
            <b-input placeholder="Search a profile..."
                type="search"
                icon="magnify"
                icon-clickable>
                @icon-click="searchIconClick"
            </b-input>
        </b-field>
      </div> -->
      <div v-for="post in posts" :key="post.id" class="post" id="postContainer">
        <!-- <a href="/publicacion" style="color:black;"> -->
        <vista-previa-publicacion :post="post" :comment="false" view=""></vista-previa-publicacion>
        <!-- </a> -->
      </div>
    </div>
    <a href="/foro/crear" class="float" title="Publicar">
      <font-awesome-icon icon="fa-solid fa-plus" class="my-float" style="width:25px; height:25px"/>
    </a>
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