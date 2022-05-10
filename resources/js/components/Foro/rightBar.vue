<template>
    <div class="right-bar">
        <div class="content">
            <div class="searcher">
                <b-field>
                    <b-input placeholder="Buscar en ErasmusConnect"
                        type="search"
                        size="is-medium"
                        icon="magnify"
                        v-model="buscador">
                        <!-- icon-clickable 
                        @icon-click="searchIconClick"-->
                    </b-input>
                </b-field>
            </div>
            <div class="sugerencias-seguir" v-if="suggestionsReady === true">
                <ul id="lista-sugerencias">
                    <div v-for="(user, index) in suggestions" :key="index">
                        <div class="user">
                            <div class="img-user">
                              <img :src="'/storage/images/users/' + user.img_url" alt="NOP" style="border-radius: 20px; max-width: 40px">
                            </div>
                            <div class="nombre-user">
                              {{ user.nickname }}
                            </div>
                        </div>
                    </div>
                </ul>
                
            </div>
        </div>
    </div>
</template>

<script>
import { faThList } from "@fortawesome/free-solid-svg-icons";

    export default {
        name: "rightBar",
        props: {},

        data() {
            return {
                posts: [],
                buscador: '',
                suggestionsArray: [],
                suggestionsReady: false
            }
        },

        computed: {
            
            suggestions() {
                let suggestionsArray = this.suggestionsArray.filter((item) => item.title.toLowerCase().indexOf(this.buscador.toLowerCase()) >= 0 || item.text.toLowerCase().indexOf(this.buscador.toLowerCase()) >= 0 );
        
                return this.$root.city == -1 ? [] : suggestionsArray.filter((item) => item.city.name == this.$root.cityName);
            }
        },

        methods: {
            getSuggestions(){
                axios.get('users/suggestions/' + this.$root.cityName).then(response=>{
                    this.suggestionsReady=true;
                    this.suggestionsArray = response.data.users;
                }).catch(error => {
                    console.info(error);
                })
            },
            getPosts() {
                axios.get(`/api/posts`).then(response => {
                this.posts = response.data.posts;
            }).catch(error => {
                    console.info(error);
                })
            },
            sendMessageToParent() {
                this.$emit("post-buscar", this.posts);
            }
        },

        mounted() {
            this.sendMessageToParent(); 
        },
    
        created() {
            this.getSuggestions();
            setTimeout(() => {
                this.getPosts();
            }, 1000)
            //console.log(this.posts);
        }
    }
</script>

<style>
input[type="search" i] {
    border-radius: 20px;
}
</style>
<style lang="scss" scoped>
$blue: #00309a;
$yellow: #F2AF13;
.right-bar {
    display:none;
    // 100px es la anchura del navbar
    border: 1px solid #dbdbdb;
    //flex-direction: column;
    overflow: hidden;
    background-color: whitesmoke;
    position: fixed;
    height: fit-content;
    height: 100%;
    min-width: 370px;
    max-width: 370px;
    padding-top: 20px;

    top: 90px;
    right: 70px;
    border-right: none;
    box-shadow: -5px 0 5px -5px rgb(0 0 0 / 24%);

    .sugerencias-seguir{
        background: red;
    }
    .lista-useres{
    overflow-y:auto;
    height: 400px;
  }

  .user{
    display: flex;
    height: 100px;
    align-items: center;
    justify-content: center;
    gap:50px;
    cursor: pointer;

    .img-user{
      border-radius: 40px;
      height: 80px;
      width: 80px;
    }

    .nombre-user{
      font-size: 30px;
    }

  }

  .user:hover {
    background: #ccc;
  }
}
.content {
    padding: 30px 10px 10px 20px;
    display: flex;
    flex-direction: column;
}
@media(min-width: 1500px) {
    .right-bar {
        display:flex;
    }
}
</style>