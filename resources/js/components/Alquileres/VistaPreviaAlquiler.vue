<template>
    <div class="apartment-preview">
        <div class="apartment-carrousel">

        </div>
        <div class="apartment-data"> 
            <div class="apartment-info">
                
            </div>
            <!-- Mostrar iframe de Google maps -->
            <div class="apartment-location">

            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
      apartment: Object,
    },
    data() {
        return {
            arrow: true,
            arrowBoth: false,
            arrowHover: false,
            iconPack: 'mdi',
            iconPrev: 'arrow-left',
            iconNext: 'arrow-right',
            iconSize: '',
            carousels: [
                { title: 'Slide 1', color: 'info' },
                { title: 'Slide 2', color: 'success' },
                { title: 'Slide 3', color: 'warning' },
                { title: 'Slide 4', color: 'danger' }
            ]
        }
    }
}
</script>
<style lang="scss" scoped>
    .apartment-preview {
        border: 1px solid black;
        display: flex;
        flex-direction: column;
        margin: 10px 0;
    }
    .apartment-carrousel {
        display:flex;
    }
    .apartment-data {
        display: flex;
        flex-direction: row;
        height: 300px;
        border: 1px solid black;
        border-bottom: 0px;
        border-left: 0px;
        border-right: 0px;
    }
    .apartment-info, .apartment-location {
        display:flex;
        width: 50%;
        height: 300px;
        border: 1px solid black;
    }
    .apartment-info {
        border-top: 0px;
        border-bottom: 0px;
        border-left: 0px;
    }
    .apartment-location {
        border-top: 0px;
        border-bottom: 0px;
        border-left: 0px;
        border-right: 0px;
    }
</style>