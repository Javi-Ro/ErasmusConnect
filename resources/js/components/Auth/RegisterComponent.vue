
<template>
  <section class="register-main">
    <div class="contenedor">
      <div class="titulo">
          <p>¡Regístrate! Es gratis</p>
      </div>
      <div style="display:flex;">
        <div style="display:flex; flex-direction: column; margin-right: 20px">
          <div class="elemento"> 
                <b-field size="is-medium" label="Nombre">
                  <b-input
                  v-model="name" 
                  size="is-medium"
                  placeholder="Nombre"> </b-input>
                </b-field>
          </div>

          <div class="elemento"> 
              <b-field size="is-medium" label="Nombre de usuario">
                <b-input
                v-model="nickname" 
                size="is-medium"
                placeholder="Nombre de usuario" title="El resto de usuarios te veran con este nombre"> </b-input>
              </b-field>
          </div>

          <div class="elemento"> 
              <b-field size="is-medium" label="Email">
                <b-input
                v-model="email" 
                size="is-medium"
                placeholder="Email"> </b-input>
              </b-field>
          </div>

          <div class="elemento"> 
              <b-field size="is-medium" label="Contraseña">
                <b-input type="password"
                  size="is-medium">
                </b-input>
            </b-field>
          </div>

          <div class="elemento"> 
              <b-field size="is-medium" label="Confirma contraseña">
                <b-input type="password"
                  size="is-medium">
                </b-input>
              </b-field>
          </div>
        </div>
        <div style="display:flex; flex-direction: column; margin-left: 20px">
          <b-field size="is-medium" label="¿A qué país viajas?" style="margin-bottom: 5px;">
          </b-field>
          <div class="elemento">
              <b-select placeholder="Elige un país" required  size="is-medium" v-model='country' @change='getCities()'>
                  <option v-for='country in countries' :key='country.id' :value='country.id'>{{ country.name }}</option>
              </b-select>
          </div>
          <b-field size="is-medium" label="¡Elige tu ciudad de destino!">
          </b-field>
          <div class="elemento">
              <b-select placeholder="Elige una ciudad" required size="is-medium" v-model='city'>
                  <option v-for='city in cities' :key='city.id' :value='city.id'>{{ city.name }}</option>
              </b-select>
          </div>
        </div>
      </div>
 


      <b-button v-on:click="newUser()" 
      class="button register is-primary" 
      id="register"
      size="is-large"
      >
        Regístrate
      </b-button>
      
    </div>

    <div>
      <footer-web></footer-web>
    </div>
  </section>

</template>

<style>
.select select:active, .select select:focus {
  border-color: #00309a
}
</style>

<style lang="scss" scoped>

  // html,body{
  //   height: 100vh;
  // }
    .titulo{
        color:#00309a;
        font-size: 30px;
        font-family: Arial, Helvetica, sans-serif;
        align-self: center;
        margin-bottom: 20px;
    }

    .contenedor{
      display:flex;
      flex-flow: column wrap;
    }

   
    .register-main{
        margin-top: 130px;
        display:flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        flex-wrap: nowrap;
    }

    .elemento{
        margin-bottom: 20px;
    }

    .register {
        margin-top: 30px;
        margin-right: 0.5rem;
        background-color: #00309a;
        color: white;
        align-self: center;
    }
    .register:hover {
        margin-right: 0.5rem;
        background-color: #00309a;;
        color: #F2AF13;
    }

</style>

<script>
  export default {
    props: {},
    data() {
      return {
            name: '',
            nickname: '',
            email: '',
            password: '',
            confirmation_password: '',
            user: null,
            country: null,
            city: null,
            countries: [],
            cities: [],
            request: {
                country_id: null
            }
      
      }
    },
   
    mounted() {
            console.log('Component mounted.')
        },

        methods: {
            setFormData() {
                this.form.name = this.name
                this.form.nickname = this.nickname
                this.form.email = this.email
                this.form.city = this.city
                this.form.password = this.password // Se encripta en backend
            },

            getCountries() {
                axios.get(`/api/countries`)
                    .then(response => {
                        this.countries = response.data.countries
                    }).catch(error => {
                        console.info(error)
                    });
            },

            getCities() {
                this.request.country_id = this.country
                axios.post(`/api/get_cities_by_country`, this.request).then(response => {
                    this.cities = response.data.cities
                }).catch(error => {
                    console.info(error)
                });
            },

            newUser() {
                if (this.password != this.confirmation_password) {
                    alert("Las contraseñas tienen que coincidir")
                    return
                }

                this.setFormData();

                axios.post(`/api/users`, this.form).then(response => {
                    this.user = response.data.user
                    alert("User created. Success -> " + response.data.success)
                }).catch(error => {
                    console.info(error)
                });
            }
        },

        created() {
            this.getCountries()
        }
  }

</script>