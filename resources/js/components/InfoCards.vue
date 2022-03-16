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
            Valoraciones</b-button>
            <b-button 
            class="btn-2" 
            type="is-link" 
            outlined>
            Alquileres</b-button>
            <b-button 
            class="btn-2" 
            type="is-link" 
            outlined>
            Quedadas</b-button>
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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi optio enim quibusdam temporibus cumque quos expedita consectetur tempora assumenda repellat quas placeat officia laboriosam veniam natus architecto facilis ut molestias maiores nihil esse ducimus mollitia nam facere cum voluptatibus unde accusamus recusandae qui officiis. Natus distinctio quis nam velit asperiores ipsa est maxime nulla voluptas cupiditate qui modi maiores beatae laboriosam praesentium commodi laborum vero exercitationem perspiciatis explicabo unde consequatur necessitatibus animi sed quasi obcaecati eos harum voluptates ipsam ea odit reiciendis alias aliquam. Labore cumque expedita quos incidunt obcaecati facere nulla tenetur soluta libero quam. Magni nulla officiis molestiae tenetur ipsa maiores ut! Aspernatur totam architecto fuga consequatur repellat delectus ea voluptate. Saepe velit quaerat minima iusto eius nemo voluptas pariatur voluptate! Voluptatem laborum nesciunt sit non sunt quos quo. Officia commodi ea veniam vero nesciunt quibusdam dolores hic autem et a odit nobis temporibus explicabo impedit laborum iusto voluptatum! Numquam consectetur dolorem maiores repudiandae quis odit praesentium soluta libero cum itaque nostrum est delectus dolore fugiat error fugit quia nulla molestiae deserunt voluptates temporibus doloremque pariatur aperiam neque tempore aut enim saepe ullam aliquid sapiente molestias animi natus dolores quisquam magnam perspiciatis quae tenetur ipsum eligendi cupiditate. Molestias tempora voluptatum et animi aut cum expedita aspernatur nesciunt iure vitae iusto dicta atque voluptates minima suscipit. Magni suscipit nesciunt quidem cumque laboriosam saepe quod similique nisi inventore voluptatum officia quibusdam. Aliquid a error libero nostrum officia dolor placeat provident porro non eius eum fugiat perspiciatis itaque fuga obcaecati at nisi rem mollitia doloribus fugit magni et iste esse excepturi beatae.
            </p>
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