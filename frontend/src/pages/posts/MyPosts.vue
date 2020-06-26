<template>
  <q-page padding>
    <q-infinite-scroll @load="onLoad" :offset="250">
      <q-list v-for="post in getAllMyPosts" :key="post.id" bordered class="rounded-borders q-mb-sm">
        <single-posts :post="post" :showSearchIcon="true" :isAdmin="isAdmin" ></single-posts>
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
  // name: 'PageName',
  created() {
    this.$axios.get('/api/v1/posts').then(response => {
        this.loadAllMyPosts(response.data.data);
      }
    ).catch(error => console.log(error));
  },
  methods: {
    ...mapActions('post',['loadAllMyPosts']),
    onLoad (index, done) {
      console.log('Loading more posts')
    }
  },
  computed : {
    ...mapGetters('post',['getAllMyPosts']),
    ...mapGetters('auth', ['getUserInfo','getToken']),
    isAdmin(){
      if(this.getUserInfo){
        return this.getUserInfo.is_admin || false;
      }else{
        return false;
      }

    }
  },
  components: {
    singlePosts: () => import('components/SinglePost')
  }
}
</script>
