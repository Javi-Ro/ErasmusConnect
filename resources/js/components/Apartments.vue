
<template>
    <div class="container" style="margin-top:100px">
        <div class="row justify-content-center">
            <select @change="sortBy(sortingBy)" v-model="sortingBy">
                <option value="-1" selected >Default</option>
                <option value="0">Mas caro primero</option>
                <option value="1">Mas barato primero</option>
            </select>
            <div class="col-md-8 info">
                
                <div class="apartment" v-for='apartment in apartments' :key='apartment.id'>
                    {{apartment.title}} {{apartment.address}}
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

    .apartment {
        display: block;
    }
</style>

<script>
    export default {
        data() {
            return {
                sortingBy: null,
                apartments: []
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            getApartments() {
                axios.get(`/api/apartments`).then(response => {
                    this.apartments = response.data.apartments;
                }).catch(error => {
                    console.info(error);
                })
            },
            sortBy(id) {
                axios.post(`/api/apartments/order`, {
                    criteria: id
                }).then(response => {
                    this.apartments = response.data.apartments;
                }).catch(error => {
                    console.info(error.response.data);
                });
            }
        },

        created() {
            this.getApartments();
        }
    }
</script>
