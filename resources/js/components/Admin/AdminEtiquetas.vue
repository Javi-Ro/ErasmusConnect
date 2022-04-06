<template>
    <div class="admin-etiquetas">
        <b-table class="table"
            :data="data"
            :columns="columns"
            :debounce-search="1000"
            :paginated=true
            :per-page=5>
         
        </b-table>

        <div class="crud-container">

            <div class="crud">

                <b-field class="field" label="Name">
                    <b-input placeholder="Compra, Aire Libre..."></b-input>
                </b-field>

                <b-button class="btn" type="is-info" outlined>Create</b-button>
            </div>


            <div class="crud">

                <b-field class="field" label="Old name">
                    <b-input ></b-input>
                </b-field>

                <b-field class="field" label="New name">
                    <b-input placeholder="Compra, Aire Libre..."></b-input>
                </b-field>

                <b-button class="btn" type="is-warning" outlined>Update</b-button>
            </div>

        </div>
  
    </div>
    
</template>

<script>
    export default {
        data() {
            return {

            
               data: [
                    { 'id': 1, 'name': 'Viaje'},
                    { 'id': 2, 'name': 'Lugar'},
                    { 'id': 3, 'name': 'Fiesta'},
                    { 'id': 4, 'name': 'Cerveza'},
                    { 'id': 5, 'name': 'Hoes'}
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
                        centered:true,
                        field: 'name',
                        label: 'Name',
                        searchable: true
                    },
                    {
                        field: 'edit',
                        label: 'Edit',
                        centered:true,
                    },
                    {
                        field: 'delete',
                        label: 'Delete',
                        centered:true,
                    }
                ]
            }
        }
    }
</script>
<style lang="scss" scoped>
    .admin-etiquetas {
    display:flex;
    // El navbar mide 280px aprox
    margin-left: 280px;
    flex-flow: row wrap;
    height: 100%;

    .table{
        width: 100%;
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