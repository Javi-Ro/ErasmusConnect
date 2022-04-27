<template>
  <section class="alquileres-container" style="background-color:whitesmoke; width:100%; height:940px">
    <filter-bar-alquiler v-model="filters"></filter-bar-alquiler>
    <filter-bar-horizontal-alquiler :filters="filters"></filter-bar-horizontal-alquiler>
    <div style="margin-top: 400px; margin-left: 500px">
      <div v-for="(apartment, index) in apartments" :key="index"> 
        <p>{{apartment.title}},{{apartment.price}}</p>
        <br>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        filters: {
          minPrice: "",
          maxPrice: "",
          habitaciones: 0,
          metros: 0,
          rate: 0
        },
        apartments: []
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
      /*handleFiltering() {
        axios.get(`/filteringAlquileres`).then(response => {
            this.apartments = response.data.apartments;
        }).catch(error => {
            console.info(error);
        })
      },*/
      getApartments() {
        axios.get(`/api/apartments`).then(response => {
            this.apartments = response.data.apartments;
        }).catch(error => {
            console.info(error);
        })
      }
    },

    mounted() {},
    created() {
      this.getApartments();
    }
  }
</script>