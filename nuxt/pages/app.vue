<template>
  <section class="hero is-link is-fullheight-with-navbar">
    <div class="hero-body">
      <div class="container">
        <p class="title">
            Chat Clone
        </p>
      </div>
    </div>
    <div class="container">
      <b-field>
        <b-input type="text"
                 placeholder="type your message"
                 icon-pack="fas"
                 icon-right	="share"
                 icon-right-clickable
                 v-model="message"
                 @icon-right-click="sendMessage(message)"
        >
        </b-input>
      </b-field>
    </div>
  </section>
</template>
<script>

export default {
  middleware: 'not_logined_user',
  async asyncData({$axios, store}) {
  },
  data(){
    return {
      message: ''
    }
  },
  created() {
  },
  methods: {
    sendMessage(value){
    },
  }
}
</script>
