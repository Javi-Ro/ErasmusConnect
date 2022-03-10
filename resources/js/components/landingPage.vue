<template>
<div id="landing" style="display: flex; justify-content: center; padding: 2% 0 0 0;">
    <div class="mapa">
        <div class="eslogan">
            <p>
                Eslogan espectacular
            </p>
        </div>
        <div class="botonPrincipal" style="display: flex;">
            <button class="btn pulse-button">
                <p style="padding: 0 10px 0 10px">
                    ¿No sabes dónde <span style="color: #ffcd00; font-weight: bold">viajar</span>? ¡Déjanos ayudarte!
                </p>
            </button>
        </div>
        <!-- <b-image
            id="europe"
            :src="require('@../../../public/img/mapa.png').default"
            alt="Mapa unión europea"
            style = "opacity: 0.5; display:flex; justify-content: center; "
        ></b-image> -->
    </div>
</div>
</template>
<style lang="scss" scoped>
/* background-image: url('~@../../../public/img/mapa.png'); */
/* Estilo de como se ve el mapa */
.mapa {
    position: relative; 
    height: 700px;
    width: 1200px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-flow: column;
}
/* Para evitar que la opacidad afecte al resto de elementos */
.mapa::before {    
      content: "";
      background-image: url('~@../../../public/img/mapa.png');
      background-size: cover;
      position: absolute;
      top: 0px;
      right: 0px;
      bottom: 0px;
      left: 0px;
      opacity: 0.5;
}
/* Estilo de como se ve el eslogan */
.eslogan {
    display: flex;
    background-color: white;
    border: 1px solid #000;
    /* position: absolute; */
    position: relative;
    min-width: 1250px;
    min-height: 250px;
    margin: 0 0 5% 0;
    justify-content: center;
    align-items: center;
    /* Modifica el texto de dentro */
    color: #000;
    font-size: 3rem;
    font-family: Arial, Helvetica, sans-serif; /* TODO: Cambiar? */
    text-transform: uppercase;
    letter-spacing: .15rem;
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
.pulse-button:hover 
{
    -webkit-animation: none;-moz-animation: none;-ms-animation: none;animation: none;
}

@-webkit-keyframes pulse {to {box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);}}
@-moz-keyframes pulse {to {box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);}}
@-ms-keyframes pulse {to {box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);}}
@keyframes pulse {to {box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);}}

// Se encarga de hacer la transición del hover
$color: #00309a;
.btn {
	display: inline-block;
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

</style>