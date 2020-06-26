<template>
  <q-item >
    <q-item-section avatar top>
      <q-avatar rounded size="40px">
        <img src="https://cdn.quasar.dev/img/boy-avatar.png">
      </q-avatar>
    </q-item-section>

    <q-item-section top>
      <q-item-label lines="1">
        <span class="text-h6">{{post.title}}</span>
        <span class="text-grey-8"> - {{ post.publication_date}}</span>
      </q-item-label>
      <q-item-label class="text-body1" :lines="linesNumber">
        {{post.description}}
      </q-item-label>
    </q-item-section>

    <q-item-section top side>
      <div class="text-grey-8 q-gutter-xs">
        <q-btn v-if="isAdmin" class="gt-xs text-orange" size="12px" flat dense round icon="edit" />
        <q-btn v-if="isAdmin" class="gt-xs  text-red" size="12px" flat dense round icon="delete" />
        <q-btn v-if="showSearchIcon" class="text-blue" size="12px" flat dense round icon="search" @click="showPost(post)" />
      </div>
    </q-item-section>
  </q-item>
</template>

<script>
export default {
  props: {
    post:{
      type:Object,
      required: true
    },
    isAdmin: {
      type:Boolean,
      default: false
    },
    showSearchIcon: {
      type:Boolean,
      default: false
    },
    linesNumber: {
      type:Number,
      default: 3
    }
  },
  methods:{
    async showPost(post){
      try {
        await this.$router.push({ name: 'post_show', params: { id: post.id } })
      } catch (err) {
        //throw new Error(`Problem handling something: ${err}.`);
      }

    }
  }
}
</script>
