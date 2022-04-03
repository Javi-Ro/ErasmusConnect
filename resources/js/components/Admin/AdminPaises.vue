<template>
    <div class="admin-paises">
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
                    <b-input placeholder="Noruega, España..."></b-input>
                </b-field>

                <b-button class="btn" type="is-info" outlined>Create</b-button>
            </div>


            <div class="crud">

                <b-field class="field" label="Old name">
                    <b-input ></b-input>
                </b-field>

                <b-field class="field" label="New name">
                    <b-input placeholder="Noruega, España..."></b-input>
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
    .admin-paises {
    display:flex;
    // El navbar mide 280px aprox
    margin-left: 290px;
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
