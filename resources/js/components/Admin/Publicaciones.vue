<template>
    <section class="admin-posts">
        <div class="title">
            PUBLICACIONES
        </div>
        <div class="main-table">
            <b-table
                :data="posts"
                :paginated="isPaginated"
                :per-page="perPage"
                :current-page.sync="currentPage"
                :pagination-simple="isPaginationSimple"
                :pagination-position="paginationPosition"
                :default-sort-direction="defaultSortDirection"
                :pagination-rounded="isPaginationRounded"
                :sort-icon="sortIcon"
                :sort-icon-size="sortIconSize"
                default-sort="user.first_name"
                aria-next-label="Next page"
                aria-previous-label="Previous page"
                aria-page-label="Page"
                aria-current-label="Current page"
                :page-input="hasInput"
                :pagination-order="paginationOrder"
                :page-input-position="inputPosition"
                :debounce-page-input="inputDebounce"
                >

                <b-table-column field="id" label="ID" numeric width="10%" sortable searchable centered v-slot="props">
                    {{ props.row.id }}
                </b-table-column>
                <b-table-column field="title" label="Titulo" width="20%" sortable searchable centered v-slot="props">
                    {{ props.row.title }}
                </b-table-column>
                <b-table-column field="post_id" label="Comentario de" width="20%" sortable searchable centered v-slot="props">
                    <span v-if="props.row.post_id === null">-</span>
                    <span v-else>{{ props.row.post_id }}</span>
                </b-table-column>
                <b-table-column field="user_id" label="Usuario" sortable width="20%" searchable numeric centered v-slot="props">
                    {{ props.row.user_id }}
                </b-table-column>
                <b-table-column field="city_id" label="Ciudad" numeric sortable searchable width="20%" centered v-slot="props">
                    {{ props.row.city_id }}
                </b-table-column>
                <b-table-column field="ver-publicacion" label="" width="5%" centered v-slot="props">
                    <b-button type="is-info" outlined size="is-small" @click.prevent="openPost(props.row);"  title="Visualizar la publicación">
                        Ver publicación
                    </b-button> 
                </b-table-column>
                <b-table-column field="eliminar" label="" centered width="5%" v-slot="props">
                    <b-button type="is-danger" @click="deletePost(props.row.id)" size="is-small" title="Borrar publicacion">
                        Eliminar
                    </b-button>
                </b-table-column>
            </b-table>
        </div>

        <!--<b-modal :active="post" v-model="isCardModalActive" :width="640" scroll="keep">
            <vista-previa-publicacion :post="post"></vista-previa-publicacion>
        </b-modal> DECLARATIVE WAY OF OPENING THE MODAL-->
        
    </section>
</template>

 <script>
    import VistaPreviaPublicacionVue from '../Foro/VistaPreviaPublicacion.vue';
    export default {
        props: {},
        data() {
            return {
                post: {},
                posts: [],
                isCardModalActive: false,
                isPaginated: true,
                isPaginationSimple: false,
                isPaginationRounded: false,
                paginationPosition: 'bottom',
                defaultSortDirection: 'asc',
                sortIcon: 'arrow-up',
                sortIconSize: 'is-small',
                currentPage: 1,
                perPage: 10,
                hasInput: false,
                paginationOrder: 'is-centered',
                inputPosition: '',
                inputDebounce: ''
            }
        },
        watch: {
            data: {
                immediate: true,
                deep: true,
                handler(val, oldVal) {
                //do something
                }
            },
        },

        computed: {},
        methods: {
            getPosts() {
                axios.get(`/api/posts`).then(response => {
                    this.posts = response.data.posts;
                }).catch(error => {
                    console.info(error);
                })
            },
            openPost(post) {  //--> Programmatic way of creating the modal.
                let vue = this;
                vue.$buefy.modal.open({
                    parent: vue,
                    animation: 'none',
                    component: VistaPreviaPublicacionVue,
                    canCancel: true,
                    props: { post: post },
                    width: 640,
                    events: {
                        
                    },
                    onCancel: () => {}
                });
            },
            deletePost(post){
                axios.delete(`/api/posts/`+post)
                .then(response => {
                    this.getPosts();
                }).catch(error => {
                    console.info(error.response.data)
                });
            }
        },

        created() {
            this.getPosts();
        }
    }
</script>