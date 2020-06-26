<template>
  <q-card style="width: 500px; max-width: 80vw;">
    <q-card-section>
      <div class="text-h6 text-center">Register Form</div>
    </q-card-section>

    <q-card-section class="q-pt-none">
      <div v-for="(v, k) in getErrors" :key="k" class="justify-center q-my-lg">
        <q-banner v-for="error in v" :key="error" dense rounded inline-actions class="text-white bg-red">
          {{ error }}
        </q-banner>
      </div>

      <q-form>
        <q-input outlined
                 v-model="formData.first_name"
                 label="First Name"
                 class="q-mb-md"
                 :rules='[
                   val => $v.formData.first_name.required || "Last Name is required",
                    val => $v.formData.first_name.minLength || "Min Length 4",
                 ]'
        />
        <q-input outlined
                 v-model="formData.last_name"
                 label="Last Name"
                 class="q-mb-md"
                 :rules='[
                   val => $v.formData.last_name.required || "Last Name is required",
                    val => $v.formData.last_name.minLength || "Min Length 4",
                 ]'
        />
        <q-input outlined
                 v-model="formData.email"
                 label="Email"
                 type="email"
                 class="q-mb-md"
                 :rules="[
                   val => $v.formData.email.required || 'Email is required',
                   val => $v.formData.email.email || 'Must provide a valid email'
                 ]"

        />
        <q-input outlined
                 v-model="formData.password"
                 label="Password"
                 class="q-mb-md"
                 type="password"
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
        label="Register"
        @click.prevent="submit"
        :disable="$v.formData.$invalid"
      />
    </q-card-actions>
  </q-card>
</template>

<script>
  import {required, minLength,email} from 'vuelidate/lib/validators'

  export default {
    data() {
      return {
        formData: {
          first_name: '',
          last_name: '',
          email: '',
          password: '',
        },
        errors: null,
      }
    },
    validations: {
      formData : {
        password: {
          required,
          minLength: minLength(4)
        },
        first_name: {
          required,
          minLength: minLength(4)
        },
        last_name: {
          required,
          minLength: minLength(4)
        },
        email: {
          required,
          email
        }
      }

    },
    methods: {
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
          this.$axios.post('/api/v1/register', this.formData)
            .then(response => {

              this.$q.notify({
                position: 'top-right',
                type: 'positive',
                message: response.data.message,
                timeout: Math.random() * 5000 + 3000
              })
            })
            .catch(error => {
              this.errors = error.response.data.errors;
            })
        }
      }
    },
    computed:{
      getErrors(){
        return this.errors;
      }
    }
  }
</script>
