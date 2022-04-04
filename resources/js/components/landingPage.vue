<template>
<div class="landing">
    <!-- Empieza la primera parte de la landing -->
    <div class="mapa">
        <div class="container-1">
            <div class="eslogan">
                <p id="textoEslogan1" style="text-align: center;">
                    El erasmus no es un año de tu vida,
                </p>
                <p id="textoEslogan2" style="text-align: center;">
                    es <strong>el</strong> año de tu vida.
                </p>
            </div>
            <div class="botonPrincipal">
                <button class="btn pulse-button">
                    <p style="padding: 0 10px 0 10px; text-align: center;">
                        ¿No sabes dónde <span style="color: #ffcd00; font-weight: bold">viajar</span>? ¡Déjanos ayudarte!
                    </p>
                </button>
            </div>
        </div>
    </div>
    <!-- Fin de la primera parte -->
    <InfoCards/>
    <!-- Tarjeta que explica los Reviews/Valoraciones -->
    <div class="tarjeta" id="tarjeta-1">
        <div class="contenido-tarjeta">
            <b-image
                id="img-tarjeta"
                :src="require('@../../../public/images/placeholder.png').default"
                alt="placeholder"
            ></b-image>
            <div class="texto" id="texto-1">
                <div class="titulo-cartas">
                    <p>Foro</p>
                </div>
                <p> 
                    ¿No sabes donde irte de Erasmus aún? ¿Lo tienes claro? Sea cual sea tu respuesta, te presentamos el foro. Un sitio donde vas a poder saber más sobre la experiencia de otros estudiantes durante su Erasmus, donde vas a poder conocer a tus futuros compañeros de aventuras, e incluso saber más de cualquier ciudad de Europa. No dudes en entrar y ver que se comenta por ahí, podrás descubrir más sobre la cultura, gastronomía, quedadas, fiestas... que gente como tú está realizando fuera de España. Obviamente, también podrás hablar y encontrar información sobre tu universidad de destino... aunque sabemos que esto ya es algo menos divertido. El foro abarca tantos países y temas distintos, que puedes pasar todas las horas que quieras descubriendo todo sobre cualquier pais de Europa. ¡Corre y presentate! Mil historias te esperan por todo el continente.
                </p>
            </div>
        </div>
    </div>

    <!-- Tarjeta que explica los Rentings -->
    <div class="tarjeta" id="tarjeta-2">
        <div class="contenido-tarjeta">
            <div class="texto" id="texto-2">
                <div class="titulo-cartas">
                    <p>Alquileres</p>
                </div>
                <p> 
                    Vas a otro país, quizás con una cultura un tanto distinta a la española... y el tener que buscar un sitio donde podamos alojarnos, realizar nuestro día a día, y superar esas resacas es algo complicado. Se junta el hecho de no poder ir en persona a ver dichos pisos, con el no saber nada sobre las inmobiliarias locales, y el no conocer a nadie. Es por ello por lo que gracias a la sección de alquileres puedes encontrar tu sitio ideal entre los cientos de ellos que ofertamos. Dentro de esta web puedes ordenar y filtrar en función de tus preferencias para que puedas hacerlo de la manera más amena y rápida posible. Por supuesto, cuentas con el foro para buscar futuros compañeros de pisos con los que montar fiestas y ver unas peilus... y bueno estudiar.
                </p>
            </div>
            <b-image
                id="img-tarjeta"
                :src="require('@../../../public/images/placeholder.png').default"
                alt="placeholder"
            ></b-image>
        </div>
    </div>

    <!-- Tarjeta que explica los Beerbuddies -->
    <div class="tarjeta" id="tarjeta-3">
        <div class="contenido-tarjeta">
            <b-image
                id="img-tarjeta"
                :src="require('@../../../public/images/placeholder.png').default"
                alt="placeholder"
            ></b-image>
            <div class="texto" id="texto-3">
                <div class="titulo-cartas">
                    <p>Eventos</p>
                </div>
                <p>
                    Esta es la parte para muchos estudiantes Erasmus, la más importante, y todos sabemos porqué... Sabemos de primera mano que el llegar a otro país sin conocer a nadie puede ser un gran reto ya que nuestro principal deseo es socializar, conocer gente, viajar, y liarla mucho... Aquí podras conocer a otros estudiantes que al igual que tú, buscan gente con quien divertirse. Existe una gran cantidad de actividades distintas a realizar, desde salir de fiesta o tomarse unas cervezas, a jugar un partido de fútbol, o irse de viaje al país vecino. Disfruta de todas las opciones y diversidad de eventos que realizan tus compañeros para hacer que esto haga de tu Erasmus la mejor experiencia de tu vida.
                </p>
            </div>
        </div>
    </div>
    <footer-web/>
</div>
</template>


<style lang="scss" scoped>
$blue:#00309a;

strong {
    color: #000;
}

.landing {
    height: 100%;
    display: flex; 
    justify-content: center; 
    align-items: center; 
    flex-flow: column;
    flex: 1;
    min-height: 0px; 
    // 100px es la anchura del navbar
    margin-top: 130px;

}
/*--------------------------------------------------------------------------------------------------*/
/*------------------------------------------MAPA----------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
/* Estilo de como se ve el mapa */
.mapa {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80%;
    height: 100%;
    // position: absolute;
}

.container-1 {
    display:flex;
    align-items: center;
    justify-content: center;
    flex-flow: column;
    z-index: 2;
    width: 100%;
    background-image: url('/images/mapa1620.png'); 
    background-repeat: no-repeat;
    background-size: cover;
    height: 80vh;
}

/* Estilo de como se ve el eslogan */
.eslogan {
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 80%;

    background-color: white;
    border: 2px solid $blue;
    border-radius: 10px;
    margin: 0 0 5% 0;
    padding: 10px 10px;

    /* Modifica el texto de dentro */
    color: #000;
    font-size: 2.3rem;
    font-family: Arial, Helvetica, sans-serif; /* TODO: Cambiar? */
    // text-transform: uppercase;
    letter-spacing: .15rem;
    text-align: center;
    box-shadow: $blue 0px 5px 15px;
}

// Se encarga de hacer la animación de pulsaciones
.pulse-button {
    width: auto;
    // height: 65px;
    border: none;
    box-shadow: 0 0 0 0 rgba(0, 48, 154, 0.7);
    background-color: #00309a;
    background-size:cover;
    background-repeat: no-repeat;
    cursor: pointer;
    -webkit-animation: pulse 3s infinite cubic-bezier(0.66, 0, 0, 1);
    -moz-animation: pulse 3s infinite cubic-bezier(0.66, 0, 0, 1);
    -ms-animation: pulse 3s infinite cubic-bezier(0.66, 0, 0, 1);
    animation: pulse 3s infinite cubic-bezier(0.66, 0, 0, 1);
    /* Modifica el texto de dentro */
    color: #fff;
    font-size: 1rem;
    font-family: Arial, Helvetica, sans-serif; /* TODO: Cambiar? */
    text-transform: uppercase;
    letter-spacing: .15rem;
}
// Detiene la animación cuando esta el cursor encima
.pulse-button:hover {
    -webkit-animation: none;-moz-animation: none;-ms-animation: none;animation: none;
}

@-webkit-keyframes pulse {to {box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);}}
@-moz-keyframes pulse {to {box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);}}
@-ms-keyframes pulse {to {box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);}}
@keyframes pulse {to {box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);}}

// Se encarga de hacer la transición del hover
$color: #00309a;
.btn {
	// display: inline-block;
	padding: .75rem 1.25rem;
	border-radius: 10rem;
	transition: all .3s;
	position: relative;
	overflow: hidden;
	z-index: 1;
	&:after {
		content: '';
		position: absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: $color;
		border-radius: 10rem;
		z-index: -2;
	}
	&:before {
		content: '';
		position: absolute;
		bottom: 0;
		left: 0;
		width: 0%;
		height: 100%;
		background-color: darken($color, 15%);
		transition: all .3s;
		border-radius: 10rem;
		z-index: -1;
	}
	&:hover {
		&:before {
			width: 100%;
		}
	}
}
// media query para modificar el tamaño de la letra del logo
@media screen and (max-width: 992px) {
    .eslogan {
        font-size: 2rem;
    }
    .container-1 {
        margin-top: 10%;
        padding-top: 10%;
        justify-content: flex-start;
        background-image: url('/images/mapa992.png'); 
        height: 50vh
    }
    .pulse-button {
        font-size: 0.75rem;
    }
    .landing {
        margin-top: 0;
    }
}
@media screen and (max-width: 425px) {
    .eslogan {
        font-size: 0.5rem;
    }
    .container-1 {
        background-image: url('/images/mapa425.png'); 
        height: 40vh;
        margin-top: 15%;
        padding-top: 20%;
    }
    .pulse-button {
        font-size: 0.45rem;
    }
}
@media screen and (max-width: 425px) {
    .eslogan {
        font-size: 1rem;
    }
    .pulse-button {
        font-size: 0.5rem;
    }
}
.botonPrincipal {
    z-index: 2;
    display: flex;
    width: 70%;
    justify-content: center;
}
.imagenMapa {
    position: absolute;
    display: flex;
    justify-content: center;
}
/*Modifica la b-image que contiene la imagen del mapa de europa*/
#europe {
    z-index: 1;
    display:flex; 
    justify-content: center; 
    height: 100%;
    width: 60%
}

/*--------------------------------------------------------------------------------------------------*/
/*------------------------------------------YU-GI-OH------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/
// Le ponemos mas margen para que sea equivalente en distancia al resto
#tarjeta-1 {
    margin-top: 4%;
}
.tarjeta {
    display: flex;
    justify-content: center;
    flex-direction: row;
    height: 100%;
    width: 95%;
    margin: 2% 0 2% 0;
    padding: 3% 3% 3% 3%;
}

#img-tarjeta {
    display:flex;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    justify-content: center; 
    height: 100%;
    width: 60%
}

.contenido-tarjeta {
    display: flex;
    justify-content: space-between;
    flex-direction: row;
}
.texto {
    font-size: 20px;
    flex-direction: column;
    display:flex;
    max-width: 70%;
    padding: 0 0 0 3%;
}

// Aquí van los textos en filas pares
#texto-2 {
    padding: 0 3% 0 0;
    // padding-left: 0%;
    // padding-right: 3%;
}

.titulo-cartas {
    display:flex;
    align-items: center;
    margin: 0 0 2% 0;
    color:#00309a;
    font-size: 30px;
    font-family: Arial, Helvetica, sans-serif; /* TODO: Cambiar? */
    text-transform: uppercase;
}

@media screen and (max-width: 1435px) {
    // .tarjeta {
    //     justify-content: center;
    // }
    .contenido-tarjeta {
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .texto {
        padding: 3% 0 0 0;
    }
    #texto-2 {
    padding: 3% 0 0 0;
    }
    #tarjeta-2 > .contenido-tarjeta{
        flex-direction: column-reverse;
    }
}
</style>