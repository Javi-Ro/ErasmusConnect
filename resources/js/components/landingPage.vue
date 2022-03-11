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
            <div class="imagenMapa">
                <b-image
                    id="europe"
                    :src="require('@../../../public/images/mapa2.png').default"
                    alt="Mapa unión europea"
                    style="opacity: 0.5"
                >
                </b-image>
            </div>
        </div>
    </div>
    <!-- Fin de la primera parte -->
    <div class="cartas">
    </div>
    <!-- <div id="cartas" style="padding: 4% 0 0 0;">
        <HorizontalCollapse />
    </div> -->
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
    padding: 2% 0 0 0;
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
    height: 100%;
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
    height: 65px;
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
        margin-top: 15%;
        justify-content: flex-start;
    }
}
@media screen and (max-width: 496px) {
    .eslogan {
        font-size: 1.5rem;
    }
    .pulse-button {
        font-size: 0.75rem;
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
    // height: 80%;
    // width: 60%;
}
/*Modifica la b-image que contiene la imagen del mapa de europa*/
#europe {
    z-index: 1;
    display:flex; 
    justify-content: center; 
    height: 100%;
    width: 60%
    // position:absolute;
}

/*--------------------------------------------------------------------------------------------------*/
/*------------------------------------------YU-GI-OH------------------------------------------------*/
/*--------------------------------------------------------------------------------------------------*/

#cartas {
    display: flex;
    width: 100%;
    height: 100%;
}
</style>