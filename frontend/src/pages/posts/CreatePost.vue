<template>
  <q-page padding>
    <div v-for="(v, k) in getErrors" :key="k" class="justify-center q-my-lg">
      <q-banner v-for="error in v" :key="error" dense rounded inline-actions class="text-white bg-red">
        {{ error }}
      </q-banner>
    </div>
    <q-form>
      <div class="row">
        <div class="col-sm-12 col-md-8  col-lg-8 ">
          <q-input outlined
                   v-model="formData.title"
                   label="Title"
                   class="q-mb-md q-mr-md"
                   :rules='[
                   val => $v.formData.title.required || "Title is required",
                    val => $v.formData.title.minLength || "Title Length 4",
                 ]'
          />
        </div>

        <div class="col-sm-4 col-md-4 col-lg-4 ">
          <q-input  class="q-mb-md"  outlined  v-model="formData.publication_date" mask="date" :rules="['date']"  label="Publication Date">
            <template v-slot:append>
              <q-icon name="event" class="cursor-pointer">
                <q-popup-proxy ref="qDateProxy" transition-show="scale" transition-hide="scale">
                  <q-date today-btn v-model="formData.publication_date" @input="() => $refs.qDateProxy.hide()"/>
                </q-popup-proxy>
              </q-icon>
            </template>
          </q-input>
        </div>
        </div>



      <q-editor
        v-model="formData.description"
        label=""
        :rules='[
                   val => $v.formData.description.required || "description is required",
                    val => $v.formData.description.minLength || "Min Length 20",
                 ]'
      />
      <q-card-actions class="justify-center">
        <q-btn
          color="primary"
          label="Save Post"
          @click.prevent="submit"
          :disable="$v.formData.$invalid"
        />
      </q-card-actions>

    </q-form>


  </q-page>
</template>

<script>
  import {required, minLength,email} from 'vuelidate/lib/validators'
  import { date } from 'quasar'
  import {mapActions} from "vuex";

export default {
  // name: 'PageName',
  data(){
    return {
      formData: {
        title: '',
        description: '',
        publication_date: date.formatDate(Date.now(), 'YYYY-MM-DD')
      },
      errors: null,
    }
  },
  methods: {
    ...mapActions('post',['savePost']),
    submit(){
      this.$v.$touch()
      this.errors = null;

      if (! this.$v.$invalid) {
        this.$axios.post('/api/v1/posts', this.formData)
          .then(response => {
            this.$router.push({ name: 'my-posts' }).catch(err => {})
          })
          .catch(error => {
            this.errors = error.response.data.errors;
          })
      } else {
        this.$q.notify({
          position: 'right',
          type: 'negative',
          message: 'Invalid Form Data.',
          timeout: Math.random() * 5000 + 3000
        })

      }
    }
  },
  validations: {
    formData: {
      title: {
        required,
        minLength: minLength(4)
      },
      description: {
        required,
        minLength: minLength(20)
      },
    }

  },
  computed:{
    getErrors(){
      return this.errors;
    }
  }
}
</script>
