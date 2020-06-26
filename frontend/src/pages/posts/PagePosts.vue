<template>
  <q-page padding>
    <q-infinite-scroll @load="onLoad" :offset="250">
      <q-list v-for="post in getAllPosts" :key="post.id">
        <single-posts :post="post" :showSearchIcon="true" ></single-posts>
      </q-list>
      <template v-slot:loading>
        <div class="row justify-center q-my-md">
          <q-spinner-dots color="primary" size="40px" />
        </div>
      </template>
    </q-infinite-scroll>

  </q-page>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex';
export default {
   name: 'PageName',
  created() {
    this.$axios.get('/api/v1/all-post').then(response => {
        this.loadAllPosts(response.data.data);
    }
    ).catch(error => console.log(error));
  },
   data(){
     return{}
   },
  computed : {
     ...mapGetters('post',['getAllPosts'])
  },
  methods: {
     ...mapActions('post',['loadAllPosts']),
    onLoad (index, done) {
      console.log('Loading more posts')
    }
  },
  components: {
    singlePosts: () => import('components/SinglePost')
  }
}
</script>
