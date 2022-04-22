
<!-- Lo que hay implementado aquí está ahora en Alquileres/Main.vue -->
<template>
    <div class="container" style="margin-top:100px">
        <div class="row justify-content-center">

            <!-- Ordenar por precio // rating // surface -->
            <select @change="sortBy(sortingBy)" v-model="sortingBy">
                <option value="-1" selected >Mostrar todos</option>
                <option value="0">Más caros primeros</option>
                <option value="1">Más baratos primeros</option>
                <option value="2">Mejores valorados primero</option>
                <option value="3">Peores valorados primeros</option>
                <option value="4">Más metros cuadrados primero</option>
                <option value="5">Menos metros cuadrados primero</option>
            </select>  


            <div class="col-md-8 info">
                <div class="apartment" v-for='apartment in apartments' :key='apartment.id'>
                    {{apartment.price}} {{apartment.rating}} {{apartment.surface}}
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
