<template>
    <section class="admin-apartments">
        <div class="title">
            ALQUILERES
        </div>
        <div class="main-table">
            <b-table
                :data="apartments"
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

                <b-table-column field="id" label="ID" numeric width="5%" sortable searchable centered v-slot="props">
                    {{ props.row.id }}
                </b-table-column>
                <b-table-column field="title" label="Titulo" width="25%" sortable searchable centered v-slot="props">
                    {{ props.row.title }}
                </b-table-column>
                <b-table-column field="phone" label="Teléfono" width="20%" sortable searchable centered v-slot="props">
                    <span v-if="props.row.phone === null">-</span>
                    <span v-else>{{ props.row.phone }}</span>
                </b-table-column>
                <b-table-column field="email" label="Email" width="20%" sortable searchable centered v-slot="props">
                    <span v-if="props.row.email === null">-</span>
                    <span v-else>{{ props.row.email }}</span>
                </b-table-column>
                <b-table-column field="price" label="Precio" sortable width="5%" searchable numeric centered v-slot="props">
                    {{ props.row.price }}
                </b-table-column>
                <b-table-column field="user_id" label="Usuario" sortable width="5%" searchable numeric centered v-slot="props">
                    {{ props.row.user_id }}
                </b-table-column>
                <b-table-column field="city_id" label="Ciudad" numeric sortable searchable width="5%" centered v-slot="props">
                    {{ props.row.city_id }}
                </b-table-column>
                <b-table-column field="ver-publicacion" label="" width="5%" centered v-slot="props">
                    <b-button type="is-info" outlined @click.prevent="openApartment(props.row);"  title="Visualizar la publicación">
                        Ver alquiler
                    </b-button> 
                </b-table-column>
                <b-table-column field="eliminar" label="" centered width="5%" v-slot="props">
                    <b-button type="is-danger" @click="deleteApartmen(props.row.id)"  title="Borrar publicacion">
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
                apartments: [],
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
            getApartments() {
                axios.get(`/api/apartments`).then(response => {
                    this.apartments = response.data.apartments;
                }).catch(error => {
                    console.info(error);
                })
            },
            openApartment(post) {  //--> Aqui se abriria el modal para ver el apartment concreto
              
            },
            deleteApartmen(post){
                axios.delete(`/api/apartments/`+post)
                .then(response => {
                    this.getApartments();
                }).catch(error => {
                    console.info(error.response.data)
                });
            }
        },

        created() {
            this.getApartments();
        }
    }
</script>
<style lang="scss" scoped>
.admin-apartments{
    width: calc(100% - 280px);
    margin-left: 280px;
    height: 100vh;
    background-color: #f8fafc;

.title {

    justify-content: center;
    display: flex;
    padding-top: 20px;
    font-size: x-large;
    color: #00309a;
    font-family: sans-serif;
    margin-bottom: 0px !important;
    padding-bottom: 1.5rem;
}

    .b-table{
        background-color: #f8fafc;

        .table-wrapper .has-mobile-cards{
            margin-right: 20px;
            margin-left: 20px;
        }
    }

    .level{
        justify-content: center !important;

        .pagination .is-current{
            background-color: #00309a !important;
        }

        .pagination-link:hover {
            border-color: #00309a;
          }
    }

    @media screen and (max-width: 425px){
        width: calc(100% - 180px);
        margin-left: 180px;
    }


}
</style>