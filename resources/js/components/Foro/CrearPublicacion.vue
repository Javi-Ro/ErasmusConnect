<template>
  <section>
    <div class="contenedor">
        <b-field label="Título" >
            <b-input maxlength="200">></b-input>
        </b-field>


        <b-field label="Texto">
            <b-input class="input-size" type="textarea"
                minlength="0"
                placeholder="">
            </b-input>
        </b-field>
        <b-field>
            <b-input placeholder="URL" type="url"></b-input>
        </b-field>

        <button class="btn">
            <p style="padding: 0 10px 0 10px; text-align: center;">
                Publicar
            </p>
        </button>
 
    </div>

    <div class="footer">
      <footer-web></footer-web>
    </div>
  </section>

</template>

<style lang="scss" scoped>

  section{
        margin-top: 130px;
        display:flex;
        flex-flow: column wrap;
        align-items: center;
        height: auto;
        justify-content: space-between;
        min-height: calc(100vh - 130px);
  }

  .input-size{
    width: 550px;
  }

  .contenedor{
      display:flex;
      flex-flow: column wrap;
      justify-content: space-between;
  }

  b-input{
    width: 500px;
    align-self: center;
  }

  .btn {
	width: 200px;
    display:flex;
    background-color: #00309a;
    font-weight: bold;
    font-size: 0.9rem;
    font-family: Arial, Helvetica, sans-serif; 
	padding: .75rem 1.25rem;
	border-radius: 10rem;
	position: relative;
	overflow: hidden;
    color:white;
}

.btn:hover {
  color: yellow;
}

</style>

<script>
import filterBarHorizontal from './filterBarHorizontal.vue'
  export default {
  components: { filterBarHorizontal },
    props: {},
    data() {
      return {}
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
    methods: {},
    mounted() {}
  }
</script>