<template>
    <!-- <div class="filter-bar">
        <div class="tag" >
            <p class="cabecera">
                Elige lo que más te interesa
            </p>
        </div>
        <div class="tags">
            <div class="tag-body" :id="setTagID(index)" 
            v-for="(tag,index) in tags" :key="tag.id" @click="getPostsByTag(tag.id)"
            >
                <div class="tag">
                    <img :src="tag.img_url" alt="" width="36px" height="36px" style="margin-right: 20px">
                    <p class="tagname vertical"></p>{{ tag.name }}
                </div>
            </div>
        </div>
    </div> -->
    <div class="filter-bar">
        <div class="tag" >
            <p class="cabecera">
                Elige lo que más te interesa
            </p>
        </div>
        <div class="tag-body" :id="setTagID(index)"
        v-for="(tag,index) in tags" :key="tag.id">
            <input type="checkbox" class="btn-check" :id="tag.id" autocomplete="off"
            v-model="selectedTags" :value="tag.id" @change="getPostsByTags()"
            >
            <label class="checkbox-button check-btn-outline" :for="tag.id">
                <img :src="tag.img_url" alt="" width="36px" height="36px" style="margin-right: 20px">
                <p class="tagname vertical">{{ tag.name }}</p>
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
                console.log("LLAMADA")
                this.getPostsByTag(this.selectedTags[i])

            }
        },
        cardModal() {
            this.$buefy.modal.open({
                parent: this,
                component: showAllTags,
                hasModalCard: true,
                customClass: 'custom-class custom-class-2',
                // trapFocus: true
            });
        }

    },

    created() {
        this.getTags();
    }
}
</script>
<style lang="scss" scoped>
$blue:#00309a;
$blue-hover:#00309a;

.filter-bar {
    display:none;
    // width: 20%;
    // height: 100%;
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

.cabecera {
    // display: flex;
    font-weight: bold;
    font-size: 1.3rem;
}

// Modificando checkbox button
.check-btn-outline {
    display: flex;
    align-items: center;
    width: 100%;
    cursor: pointer;
    padding: 10px 20px 10px 40px;
    font-size: x-large;
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
// .btn-outline-dark:checked{
//     color: white;
//     background-color: $blue;
//     border-color: $blue;
// }
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