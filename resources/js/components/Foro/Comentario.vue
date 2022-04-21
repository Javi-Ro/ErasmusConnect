<template>
  <section class="comentario-container">
    <div class="information">
      <div class="information-personal">
        <div class="information-personal-img">
          <img :src="user.img_url" alt="Profile image">
        </div>
        <div class="information-personal-data">
          <div class="information-personal-data-main">
            <p class="information-personal-data-main-user">{{ user.nickname }}</p>
          </div>
          <div class="information-personal-data-date">
            <p>{{ post.created_at }}</p>
          </div>
        </div>
      </div>
      <div class="information-description">
        <p>
          {{ post.text }}
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
    props: {},

    data() {
      return {
        optionsData: [
          {image: "/images/like.svg", title: "Me gusta", data: 45}
        ],
        post: { id: 1, title: "Aquí en Eslovaquia", text: "Hola buienas ocmo estas y tu bien y yo de locos nene.", img_url: 'ejemplo-praga.jpeg', user_id:1, likes:15 , created_at: '2022-04-03 17:47:11'},
        user: { nickname: "Nick1", img_url: "/images/users/default.jpg"}
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

    methods: {},

    mounted() {}
  }
</script>