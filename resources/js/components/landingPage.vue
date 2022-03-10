<template>
<div id="landing" style="display: flex; justify-content: center; padding: 2% 0 0 0;">
    <div class="mapa">
        <div class="eslogan">
        </div>
        <div class="botonPrincipal" style="display: flex;">
            <b-button type="is-info is-large" style="opacity:100%">Info</b-button>
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
<style>
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
/* background-image: url('~@../../../public/img/mapa.png'); */
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
}
</style>