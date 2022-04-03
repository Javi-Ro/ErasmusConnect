<template>
    <section class="admin-posts">
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

                <b-table-column field="id" label="ID" numeric width="10%" sortable searchable v-slot="props">
                    {{ props.row.id }}
                </b-table-column>
                <b-table-column field="titulo" label="Titulo" width="20%" sortable searchable v-slot="props">
                    {{ props.row.title }}
                </b-table-column>
                <b-table-column field="comentario" label="Comentario de" width="10%" sortable searchable v-slot="props">
                    <span v-if="props.row.comentario === null">-</span>
                    <span v-else>{{ props.row.post_id }}</span>
                </b-table-column>
                <b-table-column field="usuario_id" label="Usuario" sortable width="10%" searchable v-slot="props">
                    {{ props.row.user_id }}
                </b-table-column>
                <b-table-column field="ciudad_id" label="Ciudad" sortable searchable width="10%" v-slot="props">
                    {{ props.row.city_id }}
                </b-table-column>
                <b-table-column field="ver-publicacion" label="" width="5%" v-slot="props">
                    <b-button type="is-info" outlined size="is-small" @click.prevent="getPost(props.row.id); isCardModalActive = true;"  title="Visualizar la publicación">
                        Ver publicación
                    </b-button> 
                </b-table-column>
                <b-table-column field="eliminar" label="" width="5%">
                    <b-button type="is-danger" size="is-small" title="Borrar publicacion">
                        Eliminar
                    </b-button>
                </b-table-column>
            </b-table>
        </div>

        <b-modal active=true v-model="isCardModalActive" @on-cancel="post= {};" :width="640" scroll="keep">
            <vista-previa-publicacion :post="this.post"></vista-previa-publicacion>
        </b-modal>
        
    </section>
</template>

 <script>
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
            getPost(id) {
                axios.get(`/api/posts/` + id).then(response => { 
                    this.post =  response.data.post;
                }).catch(error => { 
                    console.info(error);
                });
            },
            getPosts() {
                axios.get(`/api/posts`).then(response => {
                    this.posts = response.data.posts;
                }).catch(error => {
                    console.info(error);
                })
            },
        },

        created() {
            this.getPosts();
        }
    }
</script>