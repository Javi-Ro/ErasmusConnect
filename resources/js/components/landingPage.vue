<template>
<div id="landing" style="display: flex; justify-content: center; padding: 2% 0 0 0;">
    <div id="mapa">
        <div id="eslogan">
        </div>
        <div id="botonPrincipal" style="display: flex;">
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
#mapa {
    display: flex;  
    background-image: url('~@../../../public/img/mapa.png');
    background-repeat: no-repeat;
    background-size: 100% 700px;
    /* Necesita mínimo para que sea visible */
    min-width: 1200px;
    min-height: 700px;
    opacity: 0.5;
    position: relative;
    /* Afectan al eslogan */
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
/* Estilo de como se ve el eslogan */
#eslogan {
    display: flex;
    background-color: white;
    border: 1px solid #000;
    /* position: absolute; */
    min-width: 1250px;
    min-height: 250px;
    margin: 0 0 5% 0;
}
</style>