<template>
  <section class="filter-container-horizontal">
    <div class="filter-header-horiz" @click.prevent="openPost();">
      <i class="fa-solid fa-filter"></i>
    </div>
  </section>
</template>

<script>
import FilterBarVue from './FilterModal.vue';
  export default {
    props: {
      value: {
        type: Object,
        required: true
      }
    },

    data() {
      return {
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
      openPost() {  //--> Programmatic way of creating the modal.
                let vue = this;
                vue.$buefy.modal.open({
                    parent: vue,
                    animation: 'none',
                    component: FilterBarVue,
                    canCancel: true,
                    props: { 
                      filters: this.filters
                    },
                    events: {
                      'input': filters => {
                        this.value.minPrice = filters.minPrice;
                        this.value.maxPrice = filters.maxPrice;
                        this.value.habitaciones = filters.habitaciones;
                        this.value.metros = filters.metros;
                        this.value.rate = filters.rate;
                        this.value.order = filters.order;
                      },
                      'filters': () => {
                        axios.get(`/filteringAlquileres`, {
                          params: {
                            minPrice: this.value.minPrice,
                            maxPrice: this.value.maxPrice,
                            habitaciones: this.value.habitaciones,
                            metros: this.value.metros,
                            rate: this.value.rate,
                            order: this.value.order
                          } 
                        })
                        .then(response => {
                            this.$parent.apartments = response.data.apartments;
                        }).catch(error => {
                            console.info(error);
                        })
                      }
                    },
                    onCancel: () => {
                    }
                });
            },
    },

    mounted() {}
  }
</script>

<style lang="scss">
  .filter-container-horizontal{
    left:0px;
    top:87px;
    display: flex;
    align-items: center;
    position: fixed;
    width: 100%;
    background-color: white;
    color: black;
    border: 1px solid #dbdbdb;
    padding: 20px 15px;
    @media(min-width: 1500px){
      display: none;
    }

    .filter-header-horiz{
      display: flex;
      align-items: center;
      font-weight: bold;
      font-size: 18px;
      margin-right: 20px;
      i{
        padding: 10px 10px;
      }
      i:hover{
        border-radius: 9999px;
        background-color: #dbdbdb;
        cursor: pointer;
      }
    }

    .filter-options{
      display: flex;
      align-items: center;

      .filter-option{

      }
    }
  } 
</style>