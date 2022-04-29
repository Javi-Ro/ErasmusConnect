<template>
  <div class="modal-card" style="width:auto">

    <header class="modal-card-head" >
      <p class="modal-card-title">Seguidores {{seguidores.length}}</p> 
    </header>

    <div class="lista-seguidores">
      
      <ul id="seguidores-list">
        <div v-for="seguidor in seguidores" :key="seguidor">
          <div class="seguidor">
            <div class="img-seguidor">
              <img src="/images/default-profile-img.jpeg" alt="NOP" style="border-radius: 40px; max-width: 80px">
            </div>
            <div class="nombre-seguidor">
              Raul Teado Romucho
            </div>
          </div>          
        </div>
      </ul>
    </div>
    
  </div>
</template>
<script>
export default {
  
  props:{
    seguidores:{
      type:Array,
      required:true
    }
  },
  data() {
    return{
  }
  }
}
</script>

<style lang="scss">
  .lista-seguidores{
    overflow-y:auto;
    height: 400px;
  }

  .seguidor{
    display: flex;
    height: 100px;
    align-items: center;
    justify-content: center;
    gap:50px;

    .img-seguidor{
      border-radius: 40px;
      height: 80px;
      width: 80px;
    }

    .nombre-seguidor{
      font-size: 30px;
    }

  }

</style>
