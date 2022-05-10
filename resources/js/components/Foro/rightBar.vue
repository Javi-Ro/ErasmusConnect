<template>
    <div class="right-bar">
        <div class="content">
            <div class="searcher">
                <b-field>
                    <b-input placeholder="Buscar usuarios..."
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
                <div v-for="(user, index) in suggestions" :key="index">
                    <a :href="'/' + user.nickname + '/profile'"><div class="user">
                        <div class="sug-img-user">
                            <img class="sug-img-user-img" :src="'/storage/images/users/' + user.img_url" alt="NOP" style="border-radius: 20px; max-width: 40px">
                        </div>
                        <div class="data-user">
                            <div class="data-user-nombre" style="font-weight: bold; font-size: 16px">
                            @{{ user.nickname }}
                            </div>
                            <div class="data-nombre-real-user" v-if="selectedCity !== ''" style="font-size:12px; font-weight: light">
                                {{ user.nameus }}
                            </div>
                            <div class="data-nombre-real-user" v-else style="font-size:12px; font-weight: light">
                                {{ user.name }}
                            </div>
                        </div>
                        <div class="data-posts-user">
                            {{ user.posts }}
                        </div>
                    </div></a>
                </div>
                
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
                suggestionsReady: false,
                selectedCity: ''
            }
        },

        computed: {
            suggestions() {
                if(this.$root.cityName === "") {
                    this.selectedCity = "";
                    return this.suggestionsArray.length > 10 ? this.suggestionsArray.slice(0,11) : this.suggestionsArray
                }
                this.selectedCity = this.$root.cityName;
                return this.suggestionsArray.length > 10 ? this.suggestionsArray.filter((item) => item.name === this.$root.cityName).slice(0, 11) :
                                                            this.suggestionsArray.filter((item) => item.name === this.$root.cityName);
            }
        },

        methods: {
            getSuggestions(){
                this.suggestionsReady=false;
                axios.get('users/suggestions').then(response=>{
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

    .lista-useres{
    overflow-y:auto;
    height: 400px;
  }

  .user{
    width: 100%;
    padding: 10px 5px;
    display: flex;
    //height: 100px;
    align-items: center;
    cursor: pointer;
    flex-flow: row wrap;

    .sug-img-user-img{
        max-width: 50px !important;
        border-radius: 9999px !important;
        margin-right: 20px;
    }

    .data-user{
        display: flex;
        flex-flow: column wrap;
        color: black;
        margin-right: 40px;
    }

    .data-posts-user{
        color: black;
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