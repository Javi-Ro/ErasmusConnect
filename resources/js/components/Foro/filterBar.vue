<template>
    <div class="filter-bar">
        <div class="tag" >
            <p class="cabecera">
                Elige lo que más te interesa
            </p>
        </div>
        <div class="tags">
            <div class="tag-body" :id="setTagID(index)" 
            v-for="(tag,index) in tags" :key="index" :href="tag.link"
            >
                <div class="tag" @click="selectTag(index, tag.link)">
                    <img :src="tag.img_url" alt="" width="36px" height="36px" style="margin-right: 20px">
                    <p class="tagname vertical">
                        {{tag.name}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            tags: [
                { name: "Deporte", link: "#1"},
                { name: "Fiesta", link: "#2"},
                { name: "Cine", link: "#3"},{ name: "Cine", link: "#3"},{ name: "Cine", link: "#3"},{ name: "Cine", link: "#3"},
                { name: "Cultura", link: "#4"}
            ]
        }
    },
    methods: {
        getNumberOfTags() {
            // Hay que hacer una llamada a la base de datos para obtener dinámicamente
            // el número de etiquetas que hay en la base de datos
            // Número de etiquetas - 1 para que coincida con el index que empieza en 0
            return 6 - 1;
        },
        setTagID(index) {
            // Es necesario distinguir entre la primera etiqueta y el resto
            if(index == 0)
                return "first-tag";
            // Es necesario distinguir entre la última etiqueta y el resto
            else if(index == this.getNumberOfTags())
                return "last-tag";
            else
                return "";
        },
        // Evento on-click para cuando se pulse una etiqueta
        selectTag(index, link) {
            console.log("INDEX: " + index + "\nLINK: " + link)
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

    }
}
</script>
<style lang="scss" scoped>
$blue:#00309a;
// Indica el radio de la barra de filtros
$radio: 10px;
.filter-bar {
    display:none;
    // width: 20%;
    // height: 100%;
    //border-radius: $radio;
    // 100px es la anchura del navbar
    border: 1px solid #dbdbdb;
    //flex-direction: column;
    overflow: hidden;
    background-color: white;
    position: fixed;
    height: fit-content;
    left: 0;
    padding-top: 20px;
    height: 100%;
    top: 90px;
    min-width: 300px;
    box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;

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
        margin-bottom: 20px;
        font-size: 1.5rem;
    }
}

.tag-body {
    width: 100%;
    cursor: pointer;
    -webkit-transition: background-color 0.5s ease;
}
.tag-body:hover {
    background-color: rgb(218, 218, 218);
}

// Primera etiqueta
// #first-tag {
//     border-radius: ($radio - 4px) ($radio - 4px) 0 0;
//     cursor: default;
    
// }
// #first-tag:hover {
//     background-color: transparent;
// }
// Última etiqueta
#last-tag{
    border-radius: 0 0 ($radio - 4px) ($radio - 4px);
}

.cabecera {
    // display: flex;
    font-weight: bold;
    font-size: 1.3rem;
}
    // /* Track */
    // ::-webkit-scrollbar-track {
    // background: #f1f1f1; 
    // }
    
    // // /* Handle */
    // // ::-webkit-scrollbar-thumb {
    // // background: rgb(175, 175, 175); 
    // // }

    // // /* Handle on hover */
    // // ::-webkit-scrollbar-thumb:hover {
    // // background: #888; 
    // // }
</style>