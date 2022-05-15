<template>
    <div class="main-apartments" style="background-color:whitesmoke; width:100%; height:100%">
        <filter-bar-alquiler v-model="filters"></filter-bar-alquiler>
        <filter-bar-horizontal-alquiler v-model="filters"></filter-bar-horizontal-alquiler>
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
                apartments: [],
                filters: {
                    minPrice: 0,
                    maxPrice: 0,
                    habitaciones: 0,
                    metros: 0,
                    rate: 0,
                    order: -1
                }
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

<style lang="scss">
    .main-apartments {
        height: auto;
        width: 100%;
        margin-top:100px
    }

    .apartments {
        display:flex;
        flex-direction: column;
        margin-left: 200px;
        margin-top: 10px;
        width: 100%;
        .carousel-arrow .icon:hover{
            border: 1px solid #00309a !important;
        }
        @media(max-width: 1500px) {
            margin-top: 100px;
            margin-left: 0px;
        }
    }

    .apartment {
        display: flex;
        justify-content: center;
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

.my-float{
    margin-top: 22px;
    margin-left: 22px
}
</style>
