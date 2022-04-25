
<template>
    <div class="main-apartments">
        <!-- Ordenar por precio // rating // surface -->
        <select @change="sortBy(sortingBy)" v-model="sortingBy" style="margin-left: 20px;">
            <option value="-1" selected >Mostrar todos</option>
            <option value="0">Más caros primeros</option>
            <option value="1">Más baratos primeros</option>
            <option value="2">Mejores valorados primero</option>
            <option value="3">Peores valorados primeros</option>
            <option value="4">Más metros cuadrados primero</option>
            <option value="5">Menos metros cuadrados primero</option>
        </select>  


        <div class="apartments">
            <div class="apartment" v-for='apartment in apartments' :key='apartment.id'>
                <vista-previa-alquiler :apartment="apartment"></vista-previa-alquiler>
            </div>
        </div>
        <a href="/apartments/crear" class="float" title="Crear">
            <font-awesome-icon icon="fa-solid fa-plus" class="my-float" style="width:25px; height:25px"/>
        </a>
    </div>
</template>

<script>
import VistaPreviaAlquiler from './VistaPreviaAlquiler.vue'
    export default {
  components: { VistaPreviaAlquiler },
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

<style lang="scss" scoped>
    .main-apartments {
        height: auto;
        width: 100%;
        margin-top:100px
    }

    .apartments {
        display:flex;
        flex-direction: column;
    }

    .apartment {
        display: flex;
        justify-content: center;
    }
</style>