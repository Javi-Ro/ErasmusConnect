<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de registro</div>

                    <div class="card-body">
                        <form action="" v-on:submit.prevent="newUser()">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus v-model="name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nickname" class="col-md-4 col-form-label text-md-end">Nickname</label>

                                <div class="col-md-6">
                                    <input id="nickname" type="text" class="form-control" name="nickname" required autocomplete="nickname" autofocus v-model="nickname">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus v-model="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Select Country:</label>
                                <div class="col-md-6">
                                    <select required class='form-control' v-model='country' @change='getCities()'>
                                        <option value='0' >Select Country</option>
                                        <option v-for='country in countries' :key='country.id' :value='country.id'>{{ country.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Select City:</label>
                                <div class="col-md-6">
                                    <select required class='form-control' v-model='city'>
                                        <option value='0' >Select City</option>
                                        <option v-for='city in cities' :key='city.id' :value='city.id'>{{ city.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" v-model="password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirma la contraseña</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" v-model="confirmation_password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    nickname: '',
                    email: '',
                    password: '',
                    city: ''
                },
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
                        this.countries = response.data
                    }).catch(error => {
                        console.info(error)
                    });
            },

            getCities() {
                this.request.country_id = this.country
                axios.post(`/api/get_cities`, this.request).then(response => {
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
