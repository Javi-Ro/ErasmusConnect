<template>
    <div class="cartas">
        <div class="titulo-cartas">
            <p>¡Échale un vistazo a todo lo que ofrecemos!</p>
        </div>
        <b-tabs position="is-centered" size="is-medium">
            <b-tab-item label="Conócenos">
                <div class="contenido">
                    <b-image
                        id="img-tarjeta"
                        :src="require('/images/landing/meet-us.jpg').default"
                        alt="conocenos"
                    ></b-image>
                    <div class="contenido-texto">
                        <p> ¡Nosotros somos <strong>ErasmusConnect</strong>!
                        Un grupo de estudiantes que al igual que vosotros, 
                        se embarcaron en la aventura que supone un Erasmus. 
                        Es por ello por lo que nuestro objetivo es <strong>potenciar al máximo</strong> 
                        vuestra experiencia mediante todas las opciones que ofrecemos. 
                        Sabemos que simplemente ya el hecho de elegir la ciudad de destino es todo un reto... 
                        Justo despues de tomar una decisión tan importante, nos tocará conocer gente nueva, 
                        buscarnos un alquiler para esos meses, y por supuesto y más importante 
                        <strong>¡Salir de fiesta!</strong> 
                        Navega por nuestra web para poder encontrar solución a todos estos problemas que se 
                        te pueden presentar durante todos tus meses de Erasmus. 
                        Y por supuesto, no olvides de seguirnos en nuestras redes sociales :) </p>
                    </div>
                </div>
            </b-tab-item>
            <b-tab-item label="Foro">
                <div class="contenido">
                    <b-image
                        id="img-tarjeta"
                        :src="require('/images/landing/foto-foro-2.jpg').default"
                        alt="foro"
                    ></b-image>
                    <div class="contenido-2">
                        <div class="contenido-texto">
                            <p>
                                ¿Quiéres saber más acerca de un pais en concreto y conocer a gente nueva? ¡Únete a nuestro <strong>Foro</strong>
                                Y encuentra rápidamente la información que quieras relacionada con tu ciudad de destino.
                                ¡Participa en las distintas comunidades y conoce a gente nueva que también vaya a estar de Erasmus
                                en la misma ciudad que tú!
                            </p>
                        </div>
                        <div class="contenido-btn">
                            <b-button type="is-info" size="is-medium" v-on:click="scrollTo('foro')">Saber más</b-button>
                        </div>
                    </div>
                </div>
            </b-tab-item>
            <b-tab-item label="Alquileres">
                <div class="contenido">
                    <b-image
                        id="img-tarjeta"
                        :src="require('/images/landing/alquiler.jpg').default"
                        alt="alquiler"
                    ></b-image>
                    <div class="contenido-2">
                        <div class="contenido-texto">
                            <p>
                                ¿Sabes donde viajar pero no tienes un piso al que ir? ¡Nuestro apartado de <strong>Alquileres</strong>
                                es justo lo que necesitas!
                                Podrás navegar entre distintas ofertas propuestas por los usuarios de la aplicación además de poder comparar valoraciones.
                                <br>Si te interesa alquilar un piso para estudiantes Erasmus, ¡este es el lugar donde subirlo!
                            </p>
                        </div>
                        <div class="contenido-btn">
                            <b-button type="is-info" size="is-medium" v-on:click="scrollTo('alquiler')">Saber más</b-button>
                        </div>
                    </div>
                </div>
            </b-tab-item>
            <b-tab-item label="Eventos">
                <div class="contenido">
                    <b-image
                        id="img-tarjeta"
                        :src="require('/images/landing/fiesta-2.jpg').default"
                        alt="fiesta"
                    ></b-image>
                    <div class="contenido-2">
                        <div class="contenido-texto">
                            <p>
                                ¿Ganas de fiesta pero no conoces a nadie o no conoces donde encontrar a gente de tu edad?
                                ¡No hay problema! En nuestro apartado de <strong>Eventos</strong> tendrás acceso a distintas quedadas propuesta por los usuarios
                                <br>¡Busca quedadas en tu ciudad y a disfrutar!
                            </p>
                        </div>
                        <div class="contenido-btn">
                            <b-button type="is-info" size="is-medium" v-on:click="scrollTo('eventos')">Saber más</b-button>
                        </div>
                    </div>
                </div>
            </b-tab-item>
        </b-tabs>
    </div>
</template>
<script>
    export default {
        methods: {
            scrollTo(id) {
                console.log(id)
                var element = document.getElementById(id);
                var rect = element.getBoundingClientRect();
                console.log(rect.top)
                document.documentElement.scrollTop = rect.top + 625;
            }
        }
    }

</script>

<style>
img {
    max-height: 450px;
}
</style>
<style lang="scss" scoped>
.titulo-cartas {
    width: 80%;
    display:flex;
    // align-items: center;
    justify-content: center;
    margin: 0 0 2% 0;
    color:#00309a;
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif; /* TODO: Cambiar? */
    text-transform: uppercase;
}
.titulo-cartas > p {
    text-align: center;
}

.cartas {
    align-items: center;
    flex-direction: column;
    display: flex;
    margin: 220px 25px 0 25px;

    @media(min-width: 1024px){
        margin-top: 100px;
    }
}

.contenido {
    // max-height: 450px;
    align-items: center;
    font-size: 20px;
    display: flex;
    justify-content: center;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    margin: 3% 0 0 0;
    padding: 3% 3% 3% 3%;
}
.contenido-2 {
    flex-direction: column;
    display: flex;
    width: 80%;
    margin-left: 10px;
}

.contenido-btn {
    margin: 10px 0 0 0;
    display: flex;
    justify-content: center;
}
.contenido-texto {
    display:flex;
    width: 80%;
    margin: 0 0 0 20px;
    padding: 10px 10px;
}
.contenido-2 > .contenido-texto {
    width: 100%;
    margin-bottom: 30px;
}
@media screen and (max-width: 1435px) {
    .contenido {
        flex-direction: column;
    }
    .contenido-texto {
        width: 100%;
        margin: 20px 0 0 0;
    }
    .contenido-2 {
        width: 100%;
        margin-left: 0px;
    }
    .contenido-btn {
        display: none;
    }
    .contenido-2 > .contenido-texto {
    margin-bottom: 0;
}
}
</style>