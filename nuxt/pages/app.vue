<template>
  <div>
    <ul id="messages" v-for="comment in comments">
      {{ comment.text }}
    </ul>
    <form>
      <input id="m" autocomplete="off" v-model="message"/>
      <button @click="sendMessage(message, $event)">Send</button>
    </form>
    <side-bar :chat-group="groups"></side-bar>
  </div>
</template>

<script>

import SideBar from "@/components/SideBar";

export default {
  middleware: 'not_logined_user',
  components: {
    SideBar
  },
  async asyncData({$axios, store, app}) {
    const response = await app.$api.getAllInfo()
    return {
      user: store.state.user.user,
      comments: response.message.comments,
      groups: response.message.groups
    }
  },
  data() {
    return {
      message: '',
    }
  },
  async created() {
  },
  methods: {
    async sendMessage(value, event) {
      event.preventDefault()
      const response = await this.$api.postMessage({text: value})
      const {data} = response.data.original
      if (data) {
        this.comments.push(data)
        this.message = ''
      }
    },
  }
}
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font: 13px Helvetica, Arial;
}

form {
  background: #000;
  padding: 3px;
  position: fixed;
  bottom: 0;
  width: 100%;
}

form input {
  border: 0;
  padding: 10px;
  width: 90%;
  margin-right: 0.5%;
}

form button {
  width: 9%;
  background: rgb(130, 224, 255);
  border: none;
  padding: 10px;
}

#messages {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

#messages li {
  padding: 5px 10px;
}

#messages li:nth-child(odd) {
  background: #eee;
}

</style>
