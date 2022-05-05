<template>
  <div class="modal-card" style="width:auto">

    <header class="modal-card-head" >
      <p class="modal-card-title">Seguidores {{seguidores.length}}</p> 
    </header>

    <div class="lista-seguidores">
      
      <ul id="seguidores-list">
        <div v-for="seguidor in seguidores" :key="seguidor">
          <a @click.prevent="goToProfile(seguidor.nickname)">
            <div class="seguidor">
              <div class="img-seguidor">
                <img :src="'/storage/images/users/' + seguidor.img_url" alt="NOP" style="border-radius: 40px; max-width: 80px">
              </div>
              <div class="nombre-seguidor">
                {{ seguidor.nickname }}
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
      seguidores: {}
  }
  },
  methods: {
    getSeguidores() {
      axios.get(`/api/users/seguidores/` + this.userId).then(response => {
        this.seguidores = response.data.followers;
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
    this.getSeguidores();
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
    cursor: pointer;

    .img-seguidor{
      border-radius: 40px;
      height: 80px;
      width: 80px;
    }

    .nombre-seguidor{
      font-size: 30px;
    }

  }

  .seguidor:hover {
    background: #ccc;
  }

</style>
