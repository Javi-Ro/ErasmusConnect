<template>
  <section class="example-component">
    <div class="columns is-centered">
      <div class="column is-8">
        <div class="card">
          <div class="card-header">Example Component</div>
          <div class="card-body">I'm an example component.</div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {}
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