<template>
    <div class="apartment-preview">
        <b-carousel :indicator-inside="false" :autoplay="false">
            <b-carousel-item v-for="(item, i) in 5" :key="i">
                <!-- <img :src="getImgUrl(i)"> -->
                <b-image class="image" :src="getImgUrl(i)"></b-image>
            </b-carousel-item>
            <template #indicators="props">
                <b-image class="al image" :src="getImgUrl(props.i)" :title="props.i"></b-image>
            </template>
        </b-carousel>
        <div class="apartment-data"> 
            <div class="apartment-info">
                <div class="apartment-owner-info">
                    <a class="apartment-owner-img" :href="'/' + this.user.nickname + '/profile'">
                        <img :src="imgProfile" alt="Profile image" style="border-radius: 50%;">
                    </a>
                    <div class="apartment-owner-nickname">
                        <p>@{{user.nickname}}</p>
                    </div>
                </div>
                <div class="apartment-price">
                    <p>{{apartment.price}} €/mes</p>
                </div>
                <div class="apartment-rating">
                    <div class="rate">
                        <b-rate :value="getRanting(apartment.rating)" show-score disabled/>
                    </div>
                </div>
                <div class="apartment-info-data">
                    <p> <strong>Dirección:</strong> {{apartment.address}} </p>  
                    <p> <strong>nº habitaciones:</strong> {{apartment.bedrooms}}</p>
                    <p> <strong>Superficie:</strong> {{apartment.surface}} m²</p>
                    <p> <strong>Correo electrónico:</strong> <a href="#">{{apartment.email}}</a> </p>
                    <p> <strong>Teléfono:</strong> {{apartment.phone}} </p>   
                    
                </div>
                <div class="apartment-desc">
                    <h3 style="font-size: 25px; margin: 10px 0px;">Descripción</h3>
                    <p>{{apartment.description}}}</p>
                </div>
            </div>
            <!-- Mostrar iframe de Google maps -->
            <div class="apartment-location">
                <iframe 
                :src="getMap(apartment.address)"
                width="600" height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
                </iframe>
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
            user: {},
            gallery: false,
            base_URL: "https://www.google.com/maps/embed/v1/search?q=",
            apiKey:"&key=AIzaSyDmdTjO4HYVvCyI-kkmuW3Lc1kJAqv-u40"
        }
    },
    computed: {
    //   imgUrl() {
    //     return "/storage/images/posts/" + this.post.img_url;
    //   },
        imgProfile() {
            return "storage/images/users/" + this.user.img_url;
        }
    },
    methods: {
        getUser() {
            axios.get(`/api/users/` + this.apartment.user_id).then(response => {
            this.user = response.data.user;
            console.log(this.user);
            }).catch(error => {
            console.info(error);
            });
        },
        getImgUrl(value) {
            value += 50
            return `https://picsum.photos/id/10${value}/1230/500`
        },
        getMap(address) {
            var map = this.base_URL + address + this.apiKey
            return map
        },
        getRanting(value) {
            return parseFloat(value)
        }
    },
    created() {
      setTimeout(() => {
        this.getUser();
      }, 1000)
    }
}
</script>
<style>
.carousel-item{
    display: block;
}
a {
    color: revert;
}
a:hover {
    color: revert;
}
.rate .rate-item.set-on .icon, .rate .rate-item.set-half .is-half{
    color: #F2AF13
}
.rate {
    padding: 0;
}
.is-active .al img {
    border: 1px solid #fff;
    filter: grayscale(0%);
}
.al img {
    border: 1px solid transparent;
    filter: grayscale(100%);
}
</style>
<style lang="scss" scoped>
    .apartment-preview {
        border: 1px solid #dbdbdb;
        display: flex;
        flex-direction: column;
        margin: 10px 0;
        width: 60%;
        background-color: white;
    }

    @media screen and (max-width: 1200px) {
        .apartment-preview {
            width: 100%;
        }
    }

    .apartment-carrousel {
        display:flex;
    }
    .apartment-data {
        display: flex;
        flex-direction: row;
        min-height: 300px;
        border: 1px solid #dbdbdb;
        border-bottom: 0px;
        border-left: 0px;
        border-right: 0px;
    }
    .apartment-info, .apartment-location {
        display:flex;
        width: 50%;
        border: 1px solid #dbdbdb;
    }
    .apartment-info {
        border-top: 0px;
        border-bottom: 0px;
        border-left: 0px;
        padding: 20px 2% 0 2%;
        flex-direction: column;
    }
    .apartment-location {
        border-top: 0px;
        border-bottom: 0px;
        border-left: 0px;
        border-right: 0px;
    }

    .apartment-owner-info {
        display:flex;
        flex-direction: row;
        align-items: center;
    }

    .apartment-owner-img {
        display:flex;
        object-fit: cover;
        height: 48px;
        width: 48px;
    }

    .apartment-owner-nickname {
        margin-left: 10px;
    }

    .apartment-price {
        font-size: 2rem;
        font-weight: bold;
    }
    .apartment-rating {
        display:flex;
    }
    .apartment-info-data {
        display:flex;
        flex-direction: column;
    }
    .apartment-desc {
        display:flex;
        flex-direction: column;
        padding-bottom: 20px;
    }
    @media screen and (max-width: 425px) {
        .apartment-data {
            flex-direction: column;
        }
        .apartment-info, .apartment-location {
            width: 100%;
        }
    }
    
</style>