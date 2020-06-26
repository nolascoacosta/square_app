<template>
  <q-card style="width: 500px; max-width: 80vw;">
    <q-card-section>
      <div class="text-h6 text-center">Login Form</div>
    </q-card-section>

    <q-card-section class="q-pt-none">
      <q-form >
        <q-input outlined
                 v-model.trim="formData.email"
                 :rules="[
                    val => $v.formData.email.required || 'Email is required',
                    val => $v.formData.email.email || 'Invalid email format',
                 ]"
                 label="Email" type="email" class="q-mb-md"/>
        <q-input outlined
                 v-model="formData.password"
                 label="Password"
                 type="password"
                 class="q-mb-md"
                 :rules='[
                   val => $v.formData.password.required || "Password is required",
                    val => $v.formData.password.minLength || "Min Length 4",
                 ]'
        />
      </q-form>
    </q-card-section>

    <q-card-actions align="right">
      <q-btn
        color="primary"
        label="Login"
        @click.prevent="submit"
        :disable="$v.formData.$invalid"
      />
    </q-card-actions>
  </q-card>
</template>

<script>
  import {required, minLength,email} from 'vuelidate/lib/validators'
  import { mapActions } from 'vuex';
export default {
  // name: 'ComponentName',
  data () {
    return {
      formData: {
        password : '',
        email    : '',
      }
    }
  },
  methods: {
    ...mapActions('auth',['loginUser']),
    submit(){
      this.$v.$touch()

      if (this.$v.$invalid) {
        this.$q.notify({
          position: 'right',
          type: 'negative',
          message: 'Invalid Form Data.',
          timeout: Math.random() * 5000 + 3000
        })
        console.log('ERROR')

      } else {
        this.$axios.post('/api/v1/login', this.formData)
          .then(response => {
            this.loginUser(response.data)
           this.$router.push({ name: 'create_post' }).catch(err => {})
          })
          .catch(error => {
            this.$q.notify({
              position: 'top-right',
              type: 'negative',
              message: error.response.data.errors[0].message,
              timeout: Math.random() * 5000 + 3000
            })
          })
      }
    }
  },
  validations: {
    formData: {
      email: {
        required,
        email,
      },
      password: {
        required,
        minLength: minLength(4)
      },
    }

  },
}
</script>
