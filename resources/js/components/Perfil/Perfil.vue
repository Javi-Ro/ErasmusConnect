<template>
    <div class="container" style="margin-top:100px; ">
        <!-- Listar amigos -->
            <div class="user" v-for='user in users' :key='user.nickname'>
                {{user.name}} {{user.nickname}} {{user.email}}
                 <!-- Con esto solo puede añadir a todos menos a el mismo -->
                <button 
                v-if="user.nickname != auth.nickname"
                class="btn btn-info" type="button">
                    <span class="edit-icon"></span>
                    <span>Agregar Amigos</span>
                </button>
            </div>
    </div>
</template>


<style lang="scss" scoped>
    .info {
        background-color: lightcoral;
        height: auto;
        width: 100%;
    }

    .user {
        display: block;
        margin-bottom: 0.5em;
    }
</style>

<script>
    export default {
        data() {
            return {
                users: [],
                auth: Object
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            getUsers() {
                axios.get(`/api/users`).then(response => {
                    this.users = response.data.user;
                    console.log(response.data);
                }).catch(error => {
                    console.info(error);
                })
            },
            getAuth() {
                axios.get(`/api/auth`).then(response => {
                    this.auth = response.data.user;
                    console.log(response.data);
                }).catch(error => {
                    console.info(error);
                })
            },
        },

        created() {
            this.getUsers();
            this.getAuth();
        }
    }
</script>
