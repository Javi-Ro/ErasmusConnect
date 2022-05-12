<template>
    <div id="editar-perfil">
        <div class="container">
            <div class="foto-perfil">
                <div class="foto">
                    <img src="/images/default-profile-img.jpeg" alt="NOP" style="border-radius: 400px; max-width: 800px">
                </div>
                <div class="boton-foto">
                    <b-field class="file is-primary" :class="{'has-name': !!file}">
                        <b-upload v-model="file" class="file-label" drag-drop type="is-info" accept="image/*">
                            <section class="section">
                                <div class="content has-text-centered" style="display:flex; align-items:center; justify-content:center;">
                                    <p style="margin:auto;">
                                        <b-icon
                                            icon="upload"
                                            size="is-large">
                                        </b-icon>
                                    </p>
                                    <p>Cambia tu foto de perfil</p>
                                </div>
                            </section>
                            <span class="file-name" v-if="file">
                                {{ file.name }}
                            </span>
                        </b-upload>
                    </b-field>
                </div>
            </div>
            <div class="campos">
                <b-field label="Nombre" style="width:100%;">
                    <b-input  ></b-input>
                </b-field>
                <b-field label="Biografía" style="width:100%;">
                     <b-input maxlength="300" type="textarea"></b-input>
                </b-field>
                <b-field label="Contraseña">
                    <b-input type="password" required validation-message="La contraseña es obligatoria para guardar cambios" password-reveal style="width:500px">
                    </b-input>
                </b-field>
                <b-field label="Nueva contraseña">
                    <b-input type="password" placeholder="Nueva contraseña" password-reveal style="width:500px">
                    </b-input>
                </b-field>
                <b-field>
                    <b-input type="password" placeholder="Repite tu nueva contraseña" password-reveal style="width:500px">
                    </b-input>
                </b-field>
                <div class="guardar-cambios">
                    <b-button type="is-success" size="is-medium" expanded style="width:400px;">Confirmar cambios</b-button>
                    <a :href="'/' + user.nickname + '/profile'">
                        <b-button type="is-danger"
                        outlined expanded style="width:200px; margin-top:15px;">Cancelar</b-button>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
</template>
<script>
    export default {
        data() {
            return {
                user: null,
                file: null
            }
        },
        methods: {
            getUser() {
                axios.get(`/api/auth`).then(response => {
                    this.user = response.data.user;
                    this.auth = response.data.auth;
                    if (this.auth)
                        this.profileImage = '/storage/images/users/' + this.user.img_url;
                }).catch(error => {
                    console.info(error);
                });
            },
        },
        mounted() {
            this.getUser();
        },
    }
</script>
<style lang="scss" scoped>
    #editar-perfil{
        margin: 112px;

    }
    .container{
        display: flex;
        flex-flow: row;
        .foto-perfil{
            width: 40%;
            display: flex;
            flex-flow: column;
            margin-top: 5%;
            .foto{
                display: flex;
                justify-content: center;
            }
            .boton-foto{
                margin: 20px;
                display: flex;
                justify-content: center;
            }
        }
        .campos{
            width: 60%;
            display: flex;
            flex-flow: column;
            .nueva-contra{
                display: flex;
                flex-flow: column;
            }

            .guardar-cambios{
                margin: 20px 20px 20px 0;
                color: #00309a;
                display: flex;
                flex-flow: column;
                justify-content: center;
            }
        }
    }
    
</style>
