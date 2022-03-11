<template>
  <section class="js-horizontal-collapse  horizontal-collapse">
    <!-- Se declara un ul que personaliza con el nombre de 'horizontal-collapse__inner'-->
    <ul class="horizontal-collapse__inner">

      <!--Primera carta-->
      <HorizontalCollapseItem className="horizontal-collapse__item--1">
        <!--Primer div cuando está inactivo, se muestra la cabecera-->
        <div class="horizontal-collapse__inactive-content" >
          <h2 class="horizontal-collapse__heading">
            Rentings
          </h2>
        </div>
        <!--Segundo div contenido desplegado-->
        <div class="horizontal-collapse__active-content">
          <h2 class="horizontal-collapse__heading__active">Rentings</h2>
          <p class="horizontal-collapse__body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
            modi laudantium facere aut, nemo praesentium, labore doloremque,
            porro ipsam qui nihil animi ea maiores. Ut excepturi quae veritatis.
            Recusandae, cupiditate? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Voluptates modi laudantium facere aut, nemo
            praesentium, labore doloremque, porro ipsam qui nihil animi ea
            maiores. Ut excepturi quae veritatis. Recusandae, cupiditate?
          </p>
        </div>
      </HorizontalCollapseItem>

      <!--Segunda carta-->
      <HorizontalCollapseItem className="horizontal-collapse__item--1">
        <!--Primer div cuando está inactivo, se muestra la cabecera-->
        <div class="horizontal-collapse__inactive-content">
          <h2 class="horizontal-collapse__heading">
            Reviews
          </h2>
        </div>
        <!--Segundo div contenido desplegado-->
        <div class="horizontal-collapse__active-content">
          <h2 class="horizontal-collapse__heading">Reviews</h2>
          <p class="horizontal-collapse__body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
            modi laudantium facere aut, nemo praesentium, labore doloremque,
            porro ipsam qui nihil animi ea maiores. Ut excepturi quae veritatis.
            Recusandae, cupiditate? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Voluptates modi laudantium facere aut, nemo
            praesentium, labore doloremque, porro ipsam qui nihil animi ea
            maiores. Ut excepturi quae veritatis. Recusandae, cupiditate?
          </p>
        </div>
      </HorizontalCollapseItem>

      <!--Tercera carta-->
      <HorizontalCollapseItem className="horizontal-collapse__item--1">
        <!--Primer div cuando está inactivo, se muestra la cabecera-->
        <div class="horizontal-collapse__inactive-content">
          <h2 class="horizontal-collapse__heading">Three inactive</h2>
        </div>
        <!--Segundo div contenido desplegado-->
        <div class="horizontal-collapse__active-content">
          <h2 class="horizontal-collapse__heading">Three active</h2>
          <p class="horizontal-collapse__body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
            modi laudantium facere aut, nemo praesentium, labore doloremque,
            porro ipsam qui nihil animi ea maiores. Ut excepturi quae veritatis.
            Recusandae, cupiditate? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Voluptates modi laudantium facere aut, nemo
            praesentium, labore doloremque, porro ipsam qui nihil animi ea
            maiores. Ut excepturi quae veritatis. Recusandae, cupiditate?
          </p>
        </div>
      </HorizontalCollapseItem>

      <!--Cuarta carta-->
      <HorizontalCollapseItem className="horizontal-collapse__item--1">
        <!--Primer div cuando está inactivo, se muestra la cabecera-->
        <div class="horizontal-collapse__inactive-content">
          <h2 class="horizontal-collapse__heading">Four inactive</h2>
        </div>
        <!--Segundo div contenido desplegado-->
        <div class="horizontal-collapse__active-content">
          <h2 class="horizontal-collapse__heading">Four active</h2>
          <p class="horizontal-collapse__body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
            modi laudantium facere aut, nemo praesentium, labore doloremque,
            porro ipsam qui nihil animi ea maiores. Ut excepturi quae veritatis.
            Recusandae, cupiditate? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Voluptates modi laudantium facere aut, nemo
            praesentium, labore doloremque, porro ipsam qui nihil animi ea
            maiores. Ut excepturi quae veritatis. Recusandae, cupiditate?
          </p>
        </div>
      </HorizontalCollapseItem>

      <!--Quinta carta-->
      <HorizontalCollapseItem className="horizontal-collapse__item--1">
        <!--Primer div cuando está inactivo, se muestra la cabecera-->
        <div class="horizontal-collapse__inactive-content">
          <h2 class="horizontal-collapse__heading">Five inactive</h2>
        </div>
        <!--Segundo div contenido desplegado-->
        <div class="horizontal-collapse__active-content">
          <h2 class="horizontal-collapse__heading">Five active</h2>
          <p class="horizontal-collapse__body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
            modi laudantium facere aut, nemo praesentium, labore doloremque,
            porro ipsam qui nihil animi ea maiores. Ut excepturi quae veritatis.
            Recusandae, cupiditate? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Voluptates modi laudantium facere aut, nemo
            praesentium, labore doloremque, porro ipsam qui nihil animi ea
            maiores. Ut excepturi quae veritatis. Recusandae, cupiditate?
          </p>
        </div>
      </HorizontalCollapseItem>
      <!--FIN-->
    </ul>
  </section>
</template>

<script>
import HorizontalCollapseItem from "./HorizontalCollapseItem";

export default {
  name: "HorizontalCollapse",
  components: {
    HorizontalCollapseItem
  }
};
</script>

<style lang="scss">
$transitionDurationMs: 0.5s;

// Clase base para todas las cartas
.horizontal-collapse {
  width: 100%;
  margin: 0 auto;
  display: flex;
  flex-direction: row;
  justify-content: center;
  margin-bottom: 5rem;
  color: #fff;

  *,
  *:before,
  *:after {
    box-sizing: border-box;
  }

  // ul personalizado
  &__inner {
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: row;
  }

  // Donde se define cada item y se diferencia por --x el & es como juntarlo .horizontal-collapse -> .horizontal-collapse__item 
  &__item {
    min-height: 42rem;
    list-style: none;
    padding: 0;
    overflow: hidden;
    min-width: 10rem;
    max-width: 40rem;
    position: relative;
    transition: width $transitionDurationMs;

    // Donde se personaliza la primera tarjeta
    &--1 {
      background-color: #fff;
      border: 5px solid #00309a;
      color: #000;
      margin: 0 10px 0 10px;
    }

    // Todas van a tener el mismo formato así que van a ser de tipo '--1' (Se dejan por si acaso)
    // Fondo azul y borde de color negro
    // &--2 {
    //   background-color: #00309a;
    //   border: 5px solid #000;
    //   color: #fff;
    //   margin: 0 10px 0 10px;
    // }

    // &--3 {
    //   background-color: blue;
    // }

    // &--4 {
    //   background-color: purple;
    // }

    // &--5 {
    //   background-color: orange;
    // }

    // Los cambios cuando está activo
    &.is-active {

      .horizontal-collapse__inactive-content {
        opacity: 0;
      }

      .horizontal-collapse__active-content {
        opacity: 1;
      }
    }
  }

  &__item-inner {
    padding: 3rem;
  }
  // .horizontal-collapse__inactive-content
  &__inactive-content {
    opacity: 1;
    transition: opacity $transitionDurationMs;
    position: absolute;
    bottom: 2rem;
    left: 1rem;

    // Se personaliza la cabecera cuando esta inactivo
    .horizontal-collapse__heading {
      user-select: none;
      cursor: default;
      font-size: 3rem;
      line-height: 0;
      margin-bottom: 0;
      writing-mode: vertical-lr;
      text-orientation: upright;
      // transform: rotate(180deg);
      // align-self: flex-start;
    }
  }
  // .horizontal-collapse__active-content
  &__active-content {
    opacity: 0;
    transition: opacity $transitionDurationMs;
    cursor: default;
  }
  // .horizontal-collapse__heading (Margen de la cabecera incativa)
  &__heading {
    margin-top: 0;
    margin-bottom: 2rem;
    // Intentando centrar la cabecera inactiva (la vertical)
    margin-left: 2.7rem;
  }
  // .horizontal-collapse__heading (Margen de la cabecera activa)
  &__heading__active {
    margin-top: 0;
    margin-bottom: 2rem;
  }
  // .horizontal-collapse__body (Margen de que deja debajo el cuerpo del texto activo)
  &__body {
    margin-bottom: 2rem;
  }
  // .horizontal-collapse__link (No se usa? Futuro uso? Por si acaso no tocar)
  &__link {
    display: inline-block;
    background-color: #fff;
    color: #333;
    text-decoration: none;
    line-height: 1;
    padding: 1rem 2rem;
    border-radius: 2rem;
    font-size: 1.7rem;
    font-weight: bold;
  }
}
</style>
