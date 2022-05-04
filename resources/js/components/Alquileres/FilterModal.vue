<template>
  <section class="filter-container-modal">
    <div class="filter-header">
      <p>Filtra a tu gusto</p>
    </div>
    <hr>
    <div class="filter-options">
      <div class="filter-option">
        <p class="filter-option-tag">Order</p>
        <select v-bind:value="filters.order" v-on:input="handleInput('order', $event.target.value)" class="filter-dropdown">
            <option value="-1" selected >Mostrar todos</option>
            <option value="0">Más caros primeros</option>
            <option value="1">Más baratos primeros</option>
            <option value="2">Mejores valorados primero</option>
            <option value="3">Peores valorados primeros</option>
            <option value="4">Más metros cuadrados primero</option>
            <option value="5">Menos metros cuadrados primero</option>
        </select>
      </div>
      <hr>
      <div class="filter-option">
        <p class="filter-option-tag">Precio</p>
        <div class="filter-option-content range-filter">
          <b-field class="range filter-option-input">
            <b-input placeholder="Min"
              type="number"
              min="0"
              v-model="filters.minPrice" v-on:input="handleInput('minPrice', $event)"            
              icon-pack="fas"    
              icon="euro-sign">
            </b-input>
          </b-field>
          <div class="separator">-</div>
          <b-field class="filter-option-input range">
            <b-input placeholder="Max"
              min="0"
              type="number"
              v-model="filters.maxPrice" v-on:input="handleInput('maxPrice', $event)"            
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
          <b-field class="filter-option-input">
            <b-numberinput min="0" type="is-light" rounded controls-rounded
                            v-model="filters.habitaciones" v-on:input="handleInput('habitaciones', $event)">

            </b-numberinput>
          </b-field>
        </div>
      </div>
      <hr>
      <div class="filter-option">
        <p class="filter-option-tag">Metros cuadrados</p>
        <div class="filter-option-content">
          <b-field class="filter-option-input">
            <b-numberinput min="0" type="is-light" rounded controls-rounded
                            v-model="filters.metros" v-on:input="handleInput('metros', $event)">

            </b-numberinput>
          </b-field>
        </div>
      </div>
      <hr>
      <div class="filter-option">
        <p class="filter-option-tag">Valoraciones</p>
        <div class="filter-option-content">
          <b-rate spaced show-score
                  v-model="filters.rate" v-on:input="handleInput('rate', $event)">

          </b-rate>
        </div>
      </div>
      <br>
      <b-button class="buttonFilter" type="is-link" @click="closeModal()" outlined>Filtrar</b-button>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      filters: {
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
      inputActive(){
        var element = document.getElementsByClassName("fa-euro-sign");  // TODO: Que cuando input se active el color del emoji cambie de dentro se ponga azul, no negro
        for(var i = 0; i < element.length; i++){
          element[i].className += " inputActived";
        }
        
      },
      closeModal() {
        this.$emit('filters');
        this.$emit('close');
      },
      handleInput(key, value) {
        this.$emit('input', {...this.filters, [key]: value})
      }
    },

    mounted() {}
  }
</script>

<style lang="scss">
  .filter-container-modal{
    color: black;
    padding: 20px 20px;
    border: 1px solid #dbdbdb;
    background-color: whitesmoke;
    z-index: 999;
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
    padding-bottom: 10px;
  }
  .filter-option-tag{
    font-size: 1.25rem;
    font-weight: 100;
    padding-bottom: 10px;
  }

  .range-filter{
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-start;
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
  .buttonFilter{
    border-color: #00309a !important;
    color: #00309a !important;
  }

  .buttonFilter:hover{
      background-color: #00309a !important;
      color: white !important;
  }

  .buttonFilter:focus{
      background-color: #00309a !important;
      color: white !important;
  }
</style>