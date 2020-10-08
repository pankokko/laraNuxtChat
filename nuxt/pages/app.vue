<template>
  <section class="hero is-link is-fullheight-with-navbar">
    <div class="hero-body">
      <div class="container">
        <p class="title">
          Chat Clone {{ user.name }}
        </p>
      </div>
    </div>
    <div class="container">
      <b-field>
        <b-input type="text"
                 placeholder="type your message"
                 icon-pack="fas"
                 icon-right="share"
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
    return {
      user: store.state.user.user
    }
  },
  data() {
    return {
      message: ''
    }
  },
  created() {
  },
  methods: {
    async sendMessage(value) {
      const response = await this.$axios.post('http://localhost:8000/api/chat/save', {text: value})
      if (response.data) {
        console.log(response.data)
      }
    },
  }
}
</script>
