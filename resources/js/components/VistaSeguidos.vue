<template>
  <div class="modal-card" style="width:auto">

    <header class="modal-card-head" >
      <p class="modal-card-title">Seguidos {{seguidos.length}}</p> 
    </header>

    <div class="lista-seguidos">
      
      <ul id="seguidos-list">
        <div v-for="seguido in seguidos" :key="seguido"> 
          <a @click.prevent="goToProfile(seguido.nickname)">
            <div class="seguido">
              <div class="img-seguido">
                <img :src="'/storage/images/users/' + seguido.img_url" alt="NOP" style="border-radius: 40px; max-width: 80px">
              </div>
              <div class="nombre-seguido">
                {{ seguido.nickname }}
              </div>
            </div>
          </a>        
        </div>
      </ul>
    </div>
    
  </div>
</template>
<script>
export default {
  
  props:{
    userId: Number
  },
  data() {
    return{
      seguidos: {}
  }
  },
  methods: {
    getSeguidos() {
      axios.get(`/api/users/siguiendo/` + this.userId).then(response => {
        this.seguidos = response.data.following;
      }).catch(error => {
        console.info(error.response.data);
      });
    },
    goToProfile(nickname) {
      window.location.href = '/' + nickname + '/profile';
    }
  },

  created() {
    console.log(this.userId);
    console.log("FUNCIONA");
    this.getSeguidos();
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
    cursor: pointer;

    .img-seguido{
      border-radius: 40px;
      height: 80px;
      width: 80px;
    }

    .nombre-seguido{
      font-size: 30px;
    }

  }

  .seguido:hover {
    background: #ccc;
  }

</style>