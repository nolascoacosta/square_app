<template>
  <q-page padding>
    <single-posts :post="post" :linesNumber="25" ></single-posts>
  </q-page>
</template>

<script>
export default {
  // name: 'PageName',
  created() {
    this.$axios.get(`/api/v1/show/${this.$route.params.id}`).then(response => {
        this.post = response.data.data;
      }
    ).catch(error => console.log(error));
  },
  data() {
    return {
        post:{}
    }
  },
  components: {
    singlePosts: () => import('components/SinglePost')
  }
}
</script>
