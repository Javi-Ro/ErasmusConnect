<template>
  <section v-if="dataReady === true" class="comentario-container">
    <div class="information">
      <div class="information-personal">
        <div class="information-personal-img">
          <img :src="imgUrl" alt="Profile image">
        </div>
        <div class="information-personal-data">
          <div class="information-personal-data-main">
            <p class="information-personal-data-main-user">{{ user.nickname }}</p>
          </div>
          <div class="information-personal-data-date">
            <p>{{ comment.created_at }}</p>
          </div>
        </div>
      </div>
      <div class="information-description">
        <p>
          {{ comment.text }}
        </p>
      </div>
      <div class="information-options">
        <div class="information-options-option" v-for="(option, index) in optionsData" :key="index">
          <font-awesome-icon icon="fa-regular fa-heart" style="font-size: 30px" title="Me gustas"
          v-if="index == 0"/>
          <div class="information-options-option-data">
            <!-- <strong>{{ option.title }}</strong> -->
            <p>{{ option.data }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      comment: {}
    },

    data() {
      return {
        dataReady: false,
        optionsData: [
          {image: "/images/like.svg", title: "Me gusta", data: this.comment.likes}
        ],
        user: {}
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

    computed: {
      imgUrl() {
        return "/storage/images/users/" + this.user.img_url;
      }
    },

    methods: {},

    mounted() {},
    
    created() {
      axios.get(`/api/users/` + this.comment.user_id).then(response => {
        this.user = response.data.user;
        this.dataReady = true;
      }).catch(error => {
        console.info(error.response.data);
      });
    }
  }
</script>