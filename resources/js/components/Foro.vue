<template>
    <div class="container" style="margin-top:100px">
        <div class="row justify-content-center">
            <select @change="sortBy(sortingBy)" v-model="sortingBy">
                <option value="-1">Select an option</option>
                <option value="0">Ordena de mas reciente a mas antiguo</option>
                <option value="1">Ordena de mas antiguo a mas reciente</option>
                <option value="2">Ordena por mayor popularidad</option>
                <option value="3">Ordena por menor popularidad</option>
            </select>
            <div class="col-md-8 info">
                
                <div class="post" v-for='post in posts' :key='post.id'>
                    {{post.title}} {{post.likes}} {{post.created_at}}
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .info {
        background-color: aquamarine;
        height: auto;
        width: 100%;
    }

    .post {
        display: block;
    }
</style>

<script>
    export default {
        data() {
            return {
                sortingBy: "-1",
                posts: [],

            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            getPosts() {
                axios.get(`/api/posts`).then(response => {
                    this.posts = response.data.posts;
                }).catch(error => {
                    console.info(error);
                })
            },
            sortBy(id) {
                axios.post(`/api/posts/order`, {
                    criteria: id
                }).then(response => {
                    this.posts = response.data.posts;
                }).catch(error => {
                    console.info(error.response.data);
                });
            }
        },

        created() {
            this.getPosts();
        }
    }
</script>
