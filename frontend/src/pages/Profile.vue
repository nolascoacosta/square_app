<template>
  <q-page>
    <div class="row q-col-gutter-sm q-ma-xs">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <q-card class="my-card" flat bordered>
          <q-card-section horizontal>
            <q-card-section class="q-pt-xs">
              <div class="text-overline">Blogging Platform</div>
              <div class="text-h5 q-mt-sm q-mb-xs"> {{fullName }} </div>
              <div class="text-caption text-grey">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.
              </div>
            </q-card-section>

            <q-card-section class="col-5 flex flex-center">
              <q-img
                class="rounded-borders"
                src="https://cdn.quasar.dev/img/boy-avatar.png"
              />
            </q-card-section>
          </q-card-section>

          <q-separator/>

          <q-card-section>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.
          </q-card-section>
        </q-card>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <q-card>
          <q-card-section>
            <q-form
              class="q-gutter-md"
            >
              <q-input
                filled
                v-model="user.first_name"
                label="First Name"
              />

              <q-input
                filled
                v-model="user.last_name"
                label="Last Name"

              />

              <q-input
                filled
                v-model="user.email"
                :value="getUserInfo.first_name"
                label="Email"

              />

            </q-form>
          </q-card-section>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script>
  import {mapGetters} from "vuex";
  export default {
    created() {
      this.user = this.getUserInfo;
    },
    data() {
      return {
        user: {}
      }
    },
    computed: {

      ...mapGetters('auth', ['getUserInfo']),
      fullName() {
        return this.getUserInfo.first_name + ' ' + this.getUserInfo.last_name;
      }
    }
  }
</script>

<style scoped>

</style>
