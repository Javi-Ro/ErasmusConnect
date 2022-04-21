<template>
    <div class="right-bar">
        <div class="content">
            <div class="searcher">
                <b-field>
                    <b-input placeholder="Buscar en ErasmusConnect"
                        type="search"
                        size="is-medium"
                        icon="magnify">
                        <!-- icon-clickable -->
                        @icon-click="searchIconClick"
                    </b-input>
                </b-field>
            </div>
        </div>
    </div>
</template>
<script></script>
<style>
input[type="search" i] {
    border-radius: 20px;
}
</style>
<style lang="scss" scoped>
$blue: #00309a;
$yellow: #F2AF13;
.right-bar {
    display:none;
    // 100px es la anchura del navbar
    border: 1px solid #dbdbdb;
    //flex-direction: column;
    overflow: hidden;
    background-color: whitesmoke;
    position: fixed;
    height: fit-content;
    height: 100%;
    min-width: 370px;
    max-width: 370px;
    padding-top: 20px;

    top: 90px;
    right: 70px;
    border-right: none;
    box-shadow: -5px 0 5px -5px rgb(0 0 0 / 24%);
}
.content {
    padding: 30px 10px 10px 20px;
    display: flex;
    flex-direction: column;
}
@media(min-width: 1500px) {
    .right-bar {
        display:flex;
    }
}
</style>