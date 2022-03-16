<template>
<div class="landing">
    <!-- Empieza la primera parte de la landing -->
    <div class="mapa">
        <div class="container-1">
            <div class="eslogan">
                <p id="textoEslogan">
                    Eslogan espectacular
                </p>
            </div>
            <div class="botonPrincipal">
                <button class="btn pulse-button">
                    <p style="padding: 0 10px 0 10px">
                        ¿No sabes dónde <span style="color: #ffcd00; font-weight: bold">viajar</span>? ¡Déjanos ayudarte!
                    </p>
                </button>
            </div>
            <!-- <div class="imagenMapa">
                <b-image
                    id="europe"
                    :src="require('@../../../public/images/mapa2.png').default"
                    alt="Mapa unión europea"
                    style="opacity: 0.5; background-size: cover;"
                >
                </b-image>
            </div> -->
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
                    <p>Valoraciones</p>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi optio enim quibusdam temporibus cumque quos expedita consectetur tempora assumenda repellat quas placeat officia laboriosam veniam natus architecto facilis ut molestias maiores nihil esse ducimus mollitia nam facere cum voluptatibus unde accusamus recusandae qui officiis. Natus distinctio quis nam velit asperiores ipsa est maxime nulla voluptas cupiditate qui modi maiores beatae laboriosam praesentium commodi laborum vero exercitationem perspiciatis explicabo unde consequatur necessitatibus animi sed quasi obcaecati eos harum voluptates ipsam ea odit reiciendis alias aliquam. Labore cumque expedita quos incidunt obcaecati facere nulla tenetur soluta libero quam. Magni nulla officiis molestiae tenetur ipsa maiores ut! Aspernatur totam architecto fuga consequatur repellat delectus ea voluptate. Saepe velit quaerat minima iusto eius nemo voluptas pariatur voluptate! Voluptatem laborum nesciunt sit non sunt quos quo. Voluptatem laborum nesciunt sit non sunt quos quo. Voluptatem laborum nesciunt sit non sunt quos quo. Voluptatem laborum nesciunt sit non sunt quos quo.
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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi optio enim quibusdam temporibus cumque quos expedita consectetur tempora assumenda repellat quas placeat officia laboriosam veniam natus architecto facilis ut molestias maiores nihil esse ducimus mollitia nam facere cum voluptatibus unde accusamus recusandae qui officiis. Natus distinctio quis nam velit asperiores ipsa est maxime nulla voluptas cupiditate qui modi maiores beatae laboriosam praesentium commodi laborum vero exercitationem perspiciatis explicabo unde consequatur necessitatibus animi sed quasi obcaecati eos harum voluptates ipsam ea odit reiciendis alias aliquam. Labore cumque expedita quos incidunt obcaecati facere nulla tenetur soluta libero quam. Magni nulla officiis molestiae tenetur ipsa maiores ut! Aspernatur totam architecto fuga consequatur repellat delectus ea voluptate. Saepe velit quaerat minima iusto eius nemo voluptas pariatur voluptate! Voluptatem laborum nesciunt sit non sunt quos quo. Voluptatem laborum nesciunt sit non sunt quos quo. Voluptatem laborum nesciunt sit non sunt quos quo. Voluptatem laborum nesciunt sit non sunt quos quo.
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
                    <p>Quedadas</p>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi optio enim quibusdam temporibus cumque quos expedita consectetur tempora assumenda repellat quas placeat officia laboriosam veniam natus architecto facilis ut molestias maiores nihil esse ducimus mollitia nam facere cum voluptatibus unde accusamus recusandae qui officiis. Natus distinctio quis nam velit asperiores ipsa est maxime nulla voluptas cupiditate qui modi maiores beatae laboriosam praesentium commodi laborum vero exercitationem perspiciatis explicabo unde consequatur necessitatibus animi sed quasi obcaecati eos harum voluptates ipsam ea odit reiciendis alias aliquam. Labore cumque expedita quos incidunt obcaecati facere nulla tenetur soluta libero quam. Magni nulla officiis molestiae tenetur ipsa maiores ut! Aspernatur totam architecto fuga consequatur repellat delectus ea voluptate. Saepe velit quaerat minima iusto eius nemo voluptas pariatur voluptate! Voluptatem laborum nesciunt sit non sunt quos quo. Voluptatem laborum nesciunt sit non sunt quos quo. Voluptatem laborum nesciunt sit non sunt quos quo. Voluptatem laborum nesciunt sit non sunt quos quo.
                </p>
            </div>
        </div>
    </div>

</div>
</template>


<style lang="scss" scoped>
/* background-image: url('~@../../../public/img/mapa.png'); */

.landing {
    height: 100%;
    display: flex; 
    justify-content: center; 
    align-items: center; 
    flex-flow: column;
    flex: 1;
    min-height: 0px; 
    // 68px es la anchura del navbar
    padding: 68px 0 0 0;
    margin-top: 2%;

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
    height: 80vh
}

/* Estilo de como se ve el eslogan */
.eslogan {
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 80%;

    background-color: white;
    border: 1px solid #000;
    margin: 0 0 5% 0;

    /* Modifica el texto de dentro */
    color: #000;
    font-size: 3rem;
    font-family: Arial, Helvetica, sans-serif; /* TODO: Cambiar? */
    text-transform: uppercase;
    letter-spacing: .15rem;
    text-align: center;
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
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif; /* TODO: Cambiar? */
    text-transform: uppercase;
}

@media screen and (max-width: 1100px) {
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