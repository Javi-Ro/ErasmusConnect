<template>
    <div id="editar-perfil">
        <div class="container">
            <div class="foto-perfil">
                <div class="foto">
                    <img src="/images/default-profile-img.jpeg" alt="NOP" style="border-radius: 200px; max-width: 400px">
                </div>
                <div class="boton-foto">
                    <b-button type="is-info" expanded style="width:300px; background-color:#00309a;" >Cambiar</b-button>
                </div>
            </div>
            <div class="campos">
                <b-field label="Name">
                    <b-input ></b-input>
                </b-field>
                <b-field label="Description">
                     <b-input maxlength="300" type="textarea"></b-input>
                </b-field>
            </div>
        </div>
        <div class="container-password">
            <div class="old-pass">
                <b-field label="Contraseña">
                    <b-input type="password" password-reveal style="width:500px">
                    </b-input>
                </b-field>
            </div>
            <div class="new-pass">
                <b-field label="Nueva contraseña">
                    <b-input type="password" password-reveal style="width:500px">
                    </b-input>
                </b-field>
                    <b-input type="password" password-reveal style="width:500px">
                    </b-input>
                
            </div>

        </div>
        <div class="guardar-cambios">
            <b-button type="is-info" expanded style="width:300px; background-color:#00309a;">Guardar</b-button>
        </div>
    </div>
</template>
<script>


</script>
<style lang="scss" scoped>
    #editar-perfil{
        margin: 120px;

    }
    .container{
        margin-bottom: 20px;
        display: flex;
        flex-flow: row;
        gap: 60px;
        .foto-perfil{
            width: 50%;
            display: flex;
            flex-flow: column;
            justify-content: center;
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
            width: 50%;
            display: flex;
            flex-flow: column;
        }
    }

    .container-password{
        margin-bottom: 20px;
        width: 100%;
        display: flex;
        gap: 60px;
        .old-pass{
            width: 50%;
            display: flex;
            justify-content: center;
        }
        .new-pass{
            width: 50%;
            display: flex;
            flex-flow: column;
            justify-content: center;
        }
    }

    .guardar-cambios{
        color: #00309a;
        display: flex;
        justify-content: center;
    }
</style>
