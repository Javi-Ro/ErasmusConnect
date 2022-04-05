<template>
    <div class="cartas">
        <div class="titulo-cartas">
            <p>¡Échale un vistazo a todo lo que ofrecemos!</p>
        </div>
        <div class="botones">
            <b-button 
            class="btn-2" 
            type="is-link" 
            outlined>
            Foro</b-button>
            <b-button 
            class="btn-2" 
            type="is-link" 
            outlined>
            Alquileres</b-button>
            <b-button 
            class="btn-2" 
            type="is-link" 
            outlined>
            Eventos</b-button>
            <b-button 
            class="btn-2" 
            type="is-link" 
            outlined>
            Outlined-4</b-button>
            <!-- <b-button 
            class="btn-2" 
            type="is-primary" 
            outlined>
            Outlined-5</b-button> -->
        </div>
        <div class="contenido">
        <p> ¡Nosotros somos ErasmusConnect! Un grupo de estudiantes que al igual que vosotros, se embarcaron en la aventura que supone un Erasmus. Es por ello por lo que nuestro objetivo es potenciar al máximo vuestra experiencia mediante todas las opciones que ofrecemos. Sabemos que simplemente ya el hecho de elegir la ciudad de destino es todo un reto... Justo despues de tomar una decisión tan importante, nos tocará conocer gente nueva, buscarnos un alquiler para esos meses, y por supuesto y más importante ¡Salir de fiesta! Navega por nuestra web para poder encontrar solución a todos estos problemas que se te pueden presentar durante todos tus meses de Erasmus. Y por supuesto, no olvides de seguirnos en nuestras redes sociales :) </p>
        </div>
    </div>
</template>
<style lang="scss" scoped>

.titulo-cartas {
    display:flex;
    align-items: center;
    justify-content: center;
    margin: 0 0 2% 0;
    color:#00309a;
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif; /* TODO: Cambiar? */
    text-transform: uppercase;
}

.cartas {
    display: flex;
    width: 80%;
    flex-direction: column;
    align-items: center;
    margin: 3% 0 0 0;
}
.botones {
    flex-direction: row;
    width: 100%;
    justify-content: space-evenly;
    display: flex;   
    flex-wrap: wrap;
}
.btn-2 {
    display: flex;
    margin: 1% 1% 1% 1%;
}
.contenido {
    display: flex;
    justify-content: center;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    margin: 3% 0 0 0;
    padding: 3% 3% 3% 3%;
}
@media screen and (max-width: 425px) {
    .botones {
        justify-content:space-between;
        padding: 0 10% 0 10%;
    }
    .btn-2 {
        margin: 1% 0 5% 0;
    }
}
</style>