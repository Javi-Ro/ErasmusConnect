<template>
  <section class="filter-container-horizontal">
    <div class="filter-header-horiz" @click.prevent="openPost();">
      <i class="fa-solid fa-filter"></i>
      <div>{{ this.minPricee }}</div>
    </div>
  </section>
</template>

<script>
import FilterBarVue from './FilterModal.vue';
  export default {
    props: {
      minPricee: {
        type: Number,
        default: 0
      },
      maxPrice: Number,
      habitaciones: Number,
      metros: Number,
      rate: Number,
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
                      minPriceModal: this.minPricee,
                      maxPriceModal: this.maxPrice,
                      habitacionesModal: this.habitaciones,
                      metrosModal: this.metros,
                      rateModal: this.rate,
                    },
                    events: {
                        'filters': filters_array => {
                          this.minPricee = filters_array[0];
                          this.maxPrice = filters_array[1];
                          this.habitaciones = filters_array[2];
                          this.metros = filters_array[3];
                          this.rate = filters_array[4];
                          //console.log(this.minPrice);
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