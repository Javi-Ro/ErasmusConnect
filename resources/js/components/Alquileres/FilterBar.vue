<template>
  <section class="filter-container">
    <div class="filter-header">
      <p>Filtra a tu gusto</p>
    </div>
    <hr>
    <div class="filter-options">
      <div class="filter-option">
        <p class="filter-option-tag">Precio</p>
        <div class="filter-option-content range-filter">
          <b-field class="range filter-option-input" v-model="minPrice">
            <b-input placeholder="Min"
              type="number"
              min="0"            
              icon-pack="fas"    
              icon="euro-sign" @select.prevent="inputActive()">
            </b-input>
          </b-field>
          <div class="separator">-</div>
          <b-field class="filter-option-input range" v-model="maxPrice">
            <b-input placeholder="Max"
              min="0"
              type="number"            
              icon-pack="fas"    
              icon="euro-sign">
            </b-input>
          </b-field>
        </div>
      </div>
      <hr>
      <div class="filter-option">
        <p class="filter-option-tag">Habitaciones</p>
        <div class="filter-option-content">
          <b-field class="filter-option-input" v-model="habitaciones">
            <b-numberinput min="0" type="is-light" rounded controls-rounded></b-numberinput>
          </b-field>
        </div>
      </div>
      <hr>
      <div class="filter-option">
        <p class="filter-option-tag">Metros cuadrados</p>
        <div class="filter-option-content">
          <b-field class="filter-option-input" v-model="metros">
            <b-numberinput min="0" type="is-light" rounded controls-rounded></b-numberinput>
          </b-field>
        </div>
      </div>
      <hr>
      <div class="filter-option">
        <p class="filter-option-tag">Valoraciones</p>
        <div class="filter-option-content">
          <b-rate v-model="rate" spaced show-score></b-rate>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        minPrice: 0,
        maxPrice: 0,
        habitaciones: 0,
        metros: 0,
        rate: 0,
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
      inputActive(){
        var element = document.getElementsByClassName("fa-euro-sign");  // TODO: Que cuando input se active el color del emoji cambie de dentro se ponga azul, no negro
        for(var i = 0; i < element.length; i++){
          element[i].className += " inputActived";
        }
        
      }
    },

    mounted() {}
  }
</script>

<style lang="scss">
  .filter-container{
    left: 20px;
    position:fixed;
    top: 150px;
    color: black;
    padding: 20px 20px;
    border: 1px solid black;
  }
  hr{
    background-color: gray;
    height: 1px;
  }
  .filter-header{
    font-size: 1.5rem;
    margin-bottom: 20px;
    font-weight: bold;
  }
  .filter-options{
    display: flex;
    flex-flow: column nowrap;
  }
  .filter-option{
    padding-bottom: 20px;
  }
  .filter-option-tag{
    font-size: 1.25rem;
    font-weight: 100;
    padding-bottom: 10px;
  }

  .range-filter{
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
    align-items: center;

    .separator{
      margin: 0px 10px;
    }
  }
  .filter-option-input{
    width: 200px;
    margin-bottom: 0px !important;
  }
  .range{
    width: 150px;
    input{
      border-radius: 9999px !important;
    }
  }
  .rate .rate-item.set-on .icon{
    color: #00309a !important;
  }
  .mdi-plus{
    color: #00309a !important;
  }
  .mdi-minus{
    color: #00309a !important;
  }

  .fa-euro-sign .inputActived{
    color: #00309a !important;
  }
  .input:active{
    border-color: #00309a !important;
  }
  .input:focus{
    border-color: #00309a !important;
    -webkit-box-shadow: 0px 0px 0px 0.125em rgba(0,48,154,0.25); 
    box-shadow: 0px 0px 0px 0.125em rgba(0,48,154,0.25);
  }
</style>