<template>
  <q-layout view="hHh LpR fFf" class="bg-white">
    <q-header bordered class="bg-white text-grey-8 q-py-xs" height-hint="58">
      <q-toolbar>
        <q-btn
          flat
          v-if="getUserInfo"
          dense
          round
          @click="leftDrawerOpen = !leftDrawerOpen"
          aria-label="Menu"
          icon="menu"
        />

        <q-toolbar-title  shrink class="row items-center no-wrap q-ml-md" style="cursor: pointer" @click="goToHome">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcShcRnd3-7PZnP2D6DNA8piCJ-6aHgLra1Jxg&usqp=CAU" width="20px">
          <span v-if="$q.screen.gt.xs" class="q-ml-sm text-weight-bold"> Blogging Platform</span>
        </q-toolbar-title>

        <q-space/>

        <!--<div class="YL__toolbar-input-container row no-wrap">
          <q-input dense outlined rounded v-model="search" placeholder="Search" class="bg-white col"/>
          <q-btn class="q-ml-xs" rounded color="grey-3" text-color="grey-8" icon="search" unelevated/>

        </div>-->

        <q-input class="q-mt-md" v-if="$route.path === '/'" dense outlined rounded v-model="date"  mask="date" :rules="['date']">
          <template v-slot:append>
            <q-icon name="event" class="cursor-pointer">
              <q-popup-proxy ref="qDateProxy" transition-show="scale" transition-hide="scale">
                <q-date @change="dateHasChange" v-model="date" @input="dateHasChange"/>
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>


        <q-space/>

        <div class="q-gutter-sm row items-center no-wrap" v-if="!getUserInfo">

          <q-btn outline rounded color="primary" @click="showRegForm = !showRegForm" label="Register"/>
          <q-btn outline rounded color="primary" @click="showLoginForm = !showLoginForm" label="Login"/>
        </div>
        <div class="q-gutter-sm row items-center no-wrap" v-else>
          <q-btn dense flat no-wrap>
            <q-avatar rounded size="40px">
              <img src="https://cdn.quasar.dev/img/boy-avatar.png">
            </q-avatar>
              <span class="q-subtitle-1 q-pl-md">
              {{ fullName }}
            </span>
            <q-icon name="arrow_drop_down" size="16px"/>

            <q-menu auto-close>
              <q-list dense>
                <q-item class="GL__menu-link-signed-in">
                  <q-item-section>
                    <div>Signed in as <strong> {{fullName}}</strong></div>
                  </q-item-section>
                </q-item>
                <q-item to="/profile" clickable class="GL__menu-link">
                  <q-item-section>My profile</q-item-section>
                </q-item>
                <q-separator/>
                <q-item clickable class="GL__menu-link">
                  <q-item-section @click.prevent="lougout">Log Out</q-item-section>
                </q-item>
              </q-list>
            </q-menu>
          </q-btn>
        </div>

      </q-toolbar>
    </q-header>

    <q-drawer
      v-if="getUserInfo"
      v-model="leftDrawerOpen"
      show-if-above
      side="left"
      bordered
      content-class="bg-grey-2"
      :width="280"
    >
      <q-scroll-area class="fit">
        <q-list padding>


          <q-item v-for="link in navsLinks" :key="link.lable" :to="link.to"
                  exact clickable>
            <q-item-section avatar>
              <q-icon color="grey" :name="link.icon"/>
            </q-item-section>
            <q-item-section>
              <q-item-label>{{ link.lable }}</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
      </q-scroll-area>
    </q-drawer>


    <q-dialog v-model="showLoginForm">
      <login-form></login-form>
    </q-dialog>

    <q-dialog v-model="showRegForm">
      <register-form @registered="showRegForm = !$event"></register-form>
    </q-dialog>


    <q-page-container>
      <router-view/>
    </q-page-container>

  </q-layout>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'
  import { date } from 'quasar'
  export default {
    name: 'MyLayout',

    data() {
      return {
        leftDrawerOpen: this.getUserInfo ? true :false,
        search: '',
        date: date.formatDate(Date.now(), 'YYYY-MM-DD'),
        showLoginForm: false,
        showRegForm: false,
        firstName: '',
        navsLinks: [
          {
            lable: 'Home Page',
            icon: 'home',
            to: '/'
          },
          {
            lable: 'My Post',
            icon: 'list',
            to: '/my-posts'
          },
          {
            lable: 'Create Post',
            icon: 'post_add',
            to: '/post/create'
          },
          {
            lable: 'Profile',
            icon: 'person',
            to: '/profile'
          }
        ]
      }
    },
    methods:{
      goToHome(){
        this.$router.push({ path: '/' }).catch(err => {})
      },
      dateHasChange(){

        this.$refs.qDateProxy.hide()

        this.$axios.get(`/api/v1/all-post?published_date=${this.date}`).then(response => {
            this.loadAllPosts(response.data.data);
          }
        ).catch(error => console.log(error));
      },
      ...mapActions('auth',['logoutUser']),
      ...mapActions('post',['loadAllPosts']),
      lougout(){


        this.$axios.post('/api/v1/logout')
          .then(response => {
            this.logoutUser();
            if( this.$route.path !== '/'){
              this.$router.push({ path: '/' }).catch(err => {})
            }
          })
          .catch(error => {
            console.log(error)
          })

      }
    },
    computed: {
      ...mapGetters('auth', ['getToken', 'getUserInfo']),
      fullName() {
        return this.getUserInfo.first_name + ' ' + this.getUserInfo.last_name;
      }
    },
    components: {
      loginForm: () => import('components/LoginForm.vue'),
      registerForm: () => import('components/RegisterForm.vue'),
    }
  }
</script>

<style lang="sass">
  .YL
    &__toolbar-input-container
      min-width: 100px
      width: 55%

    &__toolbar-input-btn
      border-radius: 0
      border-style: solid
      border-width: 1px 1px 1px 0
      border-color: rgba(0, 0, 0, .24)
      max-width: 60px
      width: 100%

    &__drawer-footer-link
      color: inherit
      text-decoration: none
      font-weight: 500
      font-size: .75rem

      &:hover
        color: #000
</style>
