<template>
  <div class="modal-card" style="width:auto">

    <header class="modal-card-head" >
      <p class="modal-card-title">Seguidos {{seguidos.length}}</p> 
    </header>

    <div class="lista-seguidos">
      
      <ul id="seguidos-list">
        <div v-for="seguido in seguidos" :key="seguido">
          <div class="seguido">
            <div class="img-seguido">
              <img src="/images/default-profile-img.jpeg" alt="NOP" style="border-radius: 40px; max-width: 80px">
            </div>
            <div class="nombre-seguido">
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
    seguidos:{
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
  .lista-seguidos{
    overflow-y:auto;
    height: 400px;
  }
  

  .seguido{
    display: flex;
    height: 100px;
    align-items: center;
    justify-content: center;
    gap:50px;

    .img-seguido{
      border-radius: 40px;
      height: 80px;
      width: 80px;
    }

    .nombre-seguido{
      font-size: 30px;
    }

  }

</style>