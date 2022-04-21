<template>
    <div class="reportes" v-if="dataReady==true">
        <div class="titulo-pagina">
            REPORTES
        </div>

        <div class="reporte" v-for="(report) in reports" :key="report.id">
            <div class="cabecera">
                <p style="opacity: 0.5;"> 
                    #{{ report.id }}
                </p>
                <div id="tag">
                    <b-tag type="is-warning" size="is-medium">{{ report.tagName }}</b-tag>
                </div>
                <div class="info">
                    <div id="titulo">
                        {{ report.title }}
                    </div>
                    <div id="user">
                        (@{{ report.userName }})
                    </div>
                </div>
            </div>
            <div class="contenido">
                <p>{{ report.text }}</p>
                <div class="botones">
                    <!-- Inicio de modal -->
                    <div class="modal-vue" :id="report.id">
                        <!-- Cuando se clicka sobre Ver publicación showModal pasa a valer lo mismo que el id del repote -->
                        <b-button type="is-info" outlined 
                        @click.prevent="openPost(report.id);"
                        title="Visualiza la publicación y permite eliminarla"
                        > 
                        Ver publicación
                        </b-button>
                        <b-button type="is-danger"
                            title="Borra la publicación de la base de datos">
                            Eliminar publicación
                        </b-button>
                        <!-- overlay -->
                        <!-- Cuando se clicka fuera del modal pasa a valer 0 -->
                        <div class="overlay" v-if="showModal == report.id" @click="showModal = 0"></div>
                        
                        <!-- modal -->
                        <!-- Solo aparece cuando showModal tiene el mismo valor que el id del reporte al que corresponde -->
                        <div class="modal" v-if="showModal == report.id">
                            <div class="vista-previa">
                                <div class="publicacion">
                                    <vista-previa-publicacion></vista-previa-publicacion>
                                </div>
                                <div class="btn-delete">
                                    <!-- TODO: Hay que eliminar el report.id (lo dejo para que se puedan distinguir) -->
                                    <b-button type="is-danger" outlined >Borrar publicación ({{report.id}})</b-button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin del modal -->
                    <b-button type="is-danger"
                    title="Borra el reporte de la base de datos" @click="deleteReport(report.id)">
                        Descartar reporte
                    </b-button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import VistaPreviaPublicacionVue from '../Foro/VistaPreviaPublicacion.vue';
export default {
//   components: { VistaPreviaPublicacion },
    props: {},
    data() {
        return {
            showModal: 0,
            reports: [],
            dataReady: false
        }
    },
    created(){
        this.getReports();
    },
    computed:{
        data(){
            const a = this.reports.map((item) => ({id: item.id}));
            return a;
        }
    },
    methods: {
        getReports(){
            axios.get(`/api/reports`)
                .then(response => {
                    //console.log(a);
                    this.reports = response.data.reports;
                    this.dataReady = true;
                }).catch(error => {
                    console.info(error.response.data)
                });
        },
        deleteReport(id){ 
            axios.delete(`/api/reports/` + id)
            .then(response => {
                this.getReports();
            }).catch(error => {
                console.info(error.response.data)
            });
        },
        openPost(post) {  //--> Programmatic way of creating the modal.
            let vue = this;
            vue.$buefy.modal.open({
                parent: vue,
                animation: 'none',
                component: VistaPreviaPublicacionVue,
                canCancel: true,
                props: { post: post, comment:false, view:""},
                width: 610,
                events: {
                    
                },
                onCancel: () => {}
            });
        }
    }
}
</script>
<style lang="scss" scoped>
$blue: #00309a;
$yellow: #F2AF13;
.titulo-pagina {
    justify-content: center;
    display: flex;
    margin-top: 20px;
    font-size: x-large;
    color: $blue;
    font-family: sans-serif;
    font-weight: bold;
}
.reportes {
    display:flex;
    flex-direction: column;
    justify-content: center;
    // El navbar mide 280px aprox
    margin-left: 300px;
    overflow-x: auto;
}
.reporte {
    min-width: 354px;
    border-radius: 2px;
    display: flex;
    flex-direction: column;
    margin: 40px 20px 40px 20px;
    border: 2px solid $blue;
    padding: 20px;
}
.cabecera {
    display: flex;
    flex-direction: column;
}
.info {
    display: flex;
    align-items: center;
    margin: 10px 0;
}
#tag {
    margin: 10px 0;
}
#titulo {
    font-size: 20px;
    font-weight: bold;
    margin-right: 10px;
}
#user {
    opacity: 0.75;
}
.contenido {
    display: flex;
    flex-direction: column;
}
.botones {
    display: flex;
    margin: 20px 0 0 0;
    justify-content: space-between;
}

// Parte del modal

.publicacion {
    display: flex;
}

.btn-delete {
    margin: 20px 0;
    display: flex;
    justify-content: center;
}

.vista-previa {
    flex-direction: column;
    margin-top: 100px;
    display: flex;
    justify-content: center;
}

.modal-vue .overlay {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
}

.modal-vue .modal {
    display: flex;
    position: fixed !important;
    // width: 80%;
    // max-width: 700px;
    // max-height: 500px;
    z-index: 9999;
    width: 80%;
    height: auto;
    margin: 30px auto;
    // padding: 20px 30px;
    background-color: #fff;
    // min-height: 600px;
    overflow: auto;
}

.modal-vue .close{
    position: absolute;
    top: 10px;
    right: 10px;
}

@media screen and (max-width: 425px) {
  .reportes {
      margin-left:200px;
  }
}
</style>
