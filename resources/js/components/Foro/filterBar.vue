<template>
    <div class="filter-bar">
        <a href="/foro/crear" class="button btn-publicar" id="publicar">
            <p style="padding: 0 10px 0 10px; text-align: center;">
                Publicar
            </p>
        </a>
        <div class="clear-btn" v-if="this.selectedTags.length > 0">
            <b-button type="is-danger is-light" style="border-radius: 10px border: 1px solid #cc0f35"
            @click=clearFilter()>
                <font-awesome-icon id="closeIcon" icon="fa-solid fa-x"/> 
                &nbsp; Eliminar filtros
            </b-button>
        </div>
        <div style="min-height:40px" v-if="this.selectedTags.length == 0"></div>
        <div class="tag" >
            <p class="cabecera">
                Elige lo que más te interesa
            </p>
        </div>
        
        <div class="tag-body"
        v-for="(tag) in tags" :key="tag.id" style="text-align: center;">
            <input type="checkbox" class="btn-check" :id="tag.id" autocomplete="off"
            v-model="selectedTags" :value="tag.id" @change="getPostsByTags()"
            >
            <label class="checkbox-button check-btn-outline" :for="tag.id">
                <div style="display:flex; margin-left: 20px">
                    <img :src="tag.img_url" alt="" width="36px" height="36px" style="margin-right: 20px">
                    <p class="tagname vertical">{{ tag.name }}</p>
                </div>

            </label>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            tags: [],
            selectedTags: [],
            nTags: 0
        }
    },
    methods: {
        clearFilter() {
            this.selectedTags = []
            // TODO: Falta llamada a la base de datos para obtener todos los post sin filtrar
            this.$parent.getPosts();
        },
        getTags() {
            axios.get(`/api/tags/posts`).then(response => {
                this.tags = response.data.tags;
                this.nTags = this.tags.length - 1;
            }).catch(error => {
                console.info(error);
            });
        },
        // Evento on-click para cuando se pulse una etiqueta
        getPostsByTag(tag) {
            axios.get(`/api/posts/filter-by-tag`, {
                params: {
                    tag: tag
                }
            }).then(response => {
                console.log(response.data.posts)
                this.$parent.posts = response.data.posts;
            }).catch(error => {
                console.info(error);
            });
        },
        // Evento on-click para cuando se pulse una etiqueta
        getPostsByTags() {
            console.log(this.selectedTags)
            for(var i=0; i < this.selectedTags.length; i++)
            {
                // TODO: Llamada en la que se le pasa una lista de tags?
                this.getPostsByTag(this.selectedTags[i])

            }
        },
    },

    created() {
        this.getTags();
    }
}
</script>
<style>
.clear-btn > .button.is-danger.is-light {
    background-color: #feecf0;
    color: #cc0f35;
    border: 1px solid #cc0f35;
}
</style>
<style lang="scss" scoped>
$blue:#00309a;
$blue-hover:#00309a;
$yellow: #F2AF13;
// Indica el radio de la barra de filtros
$radio: 10px;
.clear-btn {
    display:flex;
    justify-content: center;
}
.btn-publicar {
    width: 90%;
    padding: 10px 20px;
    margin: 25px 0px;

    border: none;
    border-radius: 30px;

    box-shadow: 0 0 0 0 rgba(0, 48, 154, 0.7);
    background-color: $blue;
    background-size:cover;
    background-repeat: no-repeat;
    /* Modifica el texto de dentro */
    color: $yellow;
    font-weight: bold;
    font-size: 1.5rem;
    font-family: Arial, Helvetica, sans-serif; /* TODO: Cambiar? */
    letter-spacing: .15rem;
}
#publicar {
    margin-right: 0.5rem;
    background-color: $blue;
    color: white;
}
#publicar:hover {
    margin-right: 0.5rem;
    // background-color: darken($blue, 10%);
    color: $yellow;
}
.filter-bar {
    display:none;
    // width: 20%;
    // height: 100%;
    // 100px es la anchura del navbar
    border: 1px solid #dbdbdb;
    //flex-direction: column;
    overflow: hidden;
    background-color: whitesmoke;
    position: fixed;
    height: fit-content;
    max-width: 370px;
    min-width: 370px;
    
    padding-top: 20px;
    height: 100%;
    top: 90px;
    left: 70px;
    border-left: none;
    border-right: 1px;
    box-shadow: 5px 0 5px -5px rgb(0 0 0 / 24%);

    @media(min-width: 1500px){
        display: block;
    }

}
.tags {
    display: flex;
    flex-direction: column;
    // width: 100%;
    justify-content: flex-start;
    overflow-y: auto;
    flex-wrap: nowrap;
}
.tag {
    display: flex;
    font-size: 1rem;
    margin: 10px 10px;
    margin-right: 20px;
    justify-content: flex-start;
    color: #000;
    background-color: transparent;

    .tagname .vertical{
        font-size: 0.9375;
        font-weight: 300;
    }

    .cabecera{
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 1.5rem;
    }
}

.tag-body {
    width: 100%;
    -webkit-transition: background-color 0.5s ease;
}

.cabecera {
    font-weight: bold;
    font-size: 1.3rem;
}

// Modificando checkbox button
.check-btn-outline {
    display: flex;
    align-items: center;
    width: 80%;
    margin: 10px 0 0 20px;
    cursor: pointer;
    padding: 10px 20px 10px 40px;
    font-size: x-large;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.check-btn-outline {
    border-radius: 30px;
    color: $blue;
    border-color: $blue;
}
.check-btn-outline:active {
    color: white;
    background-color: $blue;
    border-color: $blue;
}
.check-btn-outline:focus {
    box-shadow: 0 0 0 0.05rem $blue;
}

.btn-check:checked + .check-btn-outline {
    color: white;
    background-color: $blue;
    border-color: $blue;
}
.btn-check:checked + .check-btn-outline {
    box-shadow: 0 0 0 0.05rem $blue;
}
.check-btn-outline:hover {
    color: white;
    background-color: $blue-hover;
    border-color: $blue-hover;
}
</style>