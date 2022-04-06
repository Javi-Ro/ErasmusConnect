<template>
    <div class="admin-paises">
        <div class="title">
            PAISES
        </div>
        <b-table class="table"
            :data="data"
            :debounce-search="1000"
            :paginated=true
            :per-page=5>
                <b-table-column field="id" label="ID" numeric width="10%" sortable searchable centered v-slot="props">
                    {{ props.row.id }}
                </b-table-column>
                <b-table-column field="name" label="Nombre" width="20%" style="margin-left: 20px;" sortable searchable v-slot="props">
                    {{ props.row.name }}
                </b-table-column>
                <b-table-column field="editar" label="" width="5%" centered>
                    <b-button type="is-info" outlined title="Editar país">
                        Editar
                    </b-button> 
                </b-table-column>
                <b-table-column field="eliminar" label="" centered width="5%">
                    <b-button type="is-danger" title="Borrar país">
                        Eliminar
                    </b-button>
                </b-table-column>
        </b-table>

        <div class="crud-container">

            <div class="crud">

                <b-field class="field" label="Nombre">
                    <b-input placeholder="Noruega, España..."></b-input>
                </b-field>

                <b-button class="btn" type="is-success">Crear</b-button>
            </div>


            <div class="crud">

                <b-field class="field" label="Nombre">
                    <b-input ></b-input>
                </b-field>

                <b-field class="field" label="Nuevo nombre">
                    <b-input placeholder="Noruega, España..."></b-input>
                </b-field>

                <b-button class="btn" type="is-info">Actualizar</b-button>
            </div>

        </div>
  
    </div>
    
</template>

<script>
    export default {
        data() {
            return {

            
               data: [
	                { 'id': 1, 'name': 'Morolandia'},
                    { 'id': 2, 'name': 'Republica Checa'},
                    { 'id': 3, 'name': 'Croacia'},
                    { 'id': 4, 'name': 'Polonia'},
                    { 'id': 5, 'name': 'España'}
                ],
                columns: [
                    {
                        field: 'id',
                        label: 'ID',
                        width: '20%',
                        centered:true,
                        numeric: true,
                        searchable: true
                    },
                    {
                        field: 'name',
                        label: 'Nombre',
                        searchable: true
                    },
                    {
                        field: 'edit',
                        label: 'Editar',
                        centered:true,
                    },
                    {
                        field: 'delete',
                        label: 'Eliminar',
                        centered:true,
                    }
                ]
            }
        }
    }
</script>
<style lang="scss" scoped>
    .title {
        justify-content: center;
        display: flex;
        margin-top: 20px;
        font-size: x-large;
        color: #00309a;
        font-family: sans-serif;
    }
    .admin-paises {
    flex-direction: column;
    align-items: center;
    display:flex;
    justify-content: center;
    // El navbar mide 280px aprox
    // margin-left: 300px;
    height: 100%;
    margin: 10px 30px 30px 330px;


    .table{
        width: 70%;
    }
    .table > :not(:first-child) {
        border-top: 0ch;
    }

    .crud-container{
        width: 100%;
        display:flex;
        flex-flow: row wrap;
        height: 100%;
        justify-content: center; 
        
        .crud{
            display:flex;
            flex-flow: column;
            width: 50%;
            justify-content: space-between;
            align-items: center;
            .field{
                width: 350px;
            }
            .btn{
                width: 250px;
            }

        }
    }
    
    
}

</style>