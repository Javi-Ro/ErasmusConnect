<template>
    <div class="filter-bar">
        <div class="tag-menu">
            <div class="cabecera">
                <p>
                    Temas
                </p>
            </div>
            <div class="clear-btn-2" v-if="this.selectedTagsHorizontal.length > 0">
                <b-button type="is-danger is-light" @click=clearFilter()>
                    <font-awesome-icon id="closeIcon" icon="fa-solid fa-x" 
                    style="width:10px; height:10px; margin-bottom: 2.5px;"
                    title="Eliminar filtros"/> 
                </b-button>
            </div>
            <div style="min-width:30px" v-if="this.selectedTagsHorizontal.length == 0"></div>
            <div class="tags">
                <div class="tag-body" :id="setTagID(index)" 
                v-for="(tag,index) in tags" :key="tag.id"
                >
                    <input type="checkbox" class="btn-check" :id="'h-' + tag.id" autocomplete="off"
                    v-model="selectedTagsHorizontal" :value="tag.id" @change="getPostsByTags()"
                    >
                    <label class="checkbox-button check-btn-outline tag" :for="'h-' + tag.id">
                        <!-- <div class="tag"> -->
                            <p class="tagname">{{ tag.name }}</p>
                        <!-- </div> -->
                    </label>
                </div>
            </div>
        </div>
        <div class="searcher">
            <b-field>
                <b-input placeholder="Buscar"
                    type="search"
                    icon="magnify">
                    <!-- icon-clickable -->
                    @icon-click="searchIconClick"
                </b-input>
            </b-field>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            tags: [],
            selectedTagsHorizontal: [],
            nTags: 0
        }
    },
    methods: {
        clearFilter() {
            this.selectedTagsHorizontal = []
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
        setTagID(index) {
            // Es necesario distinguir entre la primera etiqueta y el resto
            if(index == 0)
                return "first-tag";
            // Es necesario distinguir entre la última etiqueta y el resto
            else if(index == this.nTags)
                return "last-tag";
            else
                return "";
        },
        // Evento on-click para cuando se pulse una etiqueta
        getPostsByTag(tag) {
            axios.get(`/api/posts/filter-by-tag`, {
                params: {
                    tag: tag
                }
            }).then(response => {
                this.$parent.posts = response.data.posts;
            }).catch(error => {
                console.info(error);
            });
        },
        // Evento on-click para cuando se pulse una etiqueta
        getPostsByTags() {
            console.log(this.selectedTagsHorizontal)
            for(var i=0; i < this.selectedTagsHorizontal.length; i++)
            {
                // TODO: Llamada en la que se le pasa una lista de tags?
                this.getPostsByTag(this.selectedTagsHorizontal[i])

            }
        },
        cardModal() {
            this.$buefy.modal.open({
                parent: this,
                component: showAllTags,
                hasModalCard: true,
                customClass: 'custom-class custom-class-2',
                // trapFocus: true
            })
        }
    },

    created() {
        this.getTags();
    }
}
</script>
<style>
.clear-btn-2 > .button.is-danger.is-light {
    background-color: #feecf0;
    color: #cc0f35;
    border: 1px solid #cc0f35;
    padding: 5px !important;
    max-height: 30px !important;
    min-width: 30px !important;
    border-radius: 50px;
}
</style>
<style lang="scss" scoped>
$blue:#00309a;
$blue-hover:#00309a;
// Indica el radio de la barra de filtros
$radio: 10px;
.searcher {
    margin-left: auto;
}
.tag-menu {
    display:flex;
    overflow: hidden;
    max-width: 100%;
}
.filter-bar {
    align-items:center;
    display:flex;
    border: 1px solid #dbdbdb;
    //flex-direction: column;
    overflow: hidden;
    background-color: white;
    position: fixed;
    height: fit-content;
    left: 0;
    padding: 20px 15px;
    top: 87px;
    width: 100%;
    z-index: 5;

    @media(min-width: 1500px){
        display: none;
    }

}
.tags {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    overflow-y: auto;
    flex-wrap: nowrap;
    align-items: center;
    margin-bottom: 0;
    margin-left: 10px;
}
.tag {
    display: flex;
    font-size: 1rem;
    justify-content: center;
    color: #000;
    background-color: #e4e6eb;
    padding: 15px;
    margin-right: 15px;
    border-radius: 20px;
    font-weight: 500;
    margin-bottom: 0;
    cursor: pointer;
}

.tag:hover{
    background-color: $blue;
    color: white
}

.btn-check:checked + .check-btn-outline {
    color: white;
    background-color: $blue;
    border-color: $blue;
}
.btn-check:checked + .check-btn-outline {
    box-shadow: 0 0 0 0.05rem $blue;
}

.tag-body {
    width: 100%;
    cursor: pointer;
}

// Última etiqueta
#last-tag{
    border-radius: 20px;
}

.cabecera {
    // display: flex;
    font-weight: bold;
    font-size: 1.5rem;
    color: #000;
    margin-right: 10px;
}
// Modificando checkbox button
.check-btn-outline {
    display: flex;
    align-items: center;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.check-btn-outline {
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
@media(max-width: 500px){
    .filter-bar {
        align-items: normal !important;
        flex-flow: column-reverse;
    }
    .searcher {
        margin-left: 0;
        margin-bottom: 10px;
    }
}
</style>