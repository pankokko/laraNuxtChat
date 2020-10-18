<template>
<div>
  <ul id="messages" v-for="comment in comments">
    {{comment.text}}
  </ul>
  <form >
    <input id="m" autocomplete="off" v-model="message" /><button @click="sendMessage(message, $event)">Send</button>
  </form>

  <side-bar></side-bar>

<!--  <div class="container">-->
<!--    <b-field>-->
<!--      <b-input type="text"-->
<!--               placeholder="type your message"-->
<!--               icon-pack="fas"-->
<!--               icon-right="share"-->
<!--               icon-right-clickable-->
<!--               v-model="message"-->
<!--               @icon-right-click="sendMessage(message)"-->
<!--      >-->
<!--      </b-input>-->
<!--    </b-field>-->
<!--  </div>-->

</div>


</template>

<script>

import SideBar from "@/components/SideBar";

export default {
  middleware: 'not_logined_user',
  components: {
    SideBar
  },
  async asyncData({$axios, store, $cookies, $router}) {
    const response = await $axios.get('http://localhost:8000/api/chat/all_info')
    return {
      user: store.state.user.user,
      comments: response.data.message.comments

    }
  },
  data() {
    return {
      message: '',
    }
  },
  created() {
    console.log(this.comments)
  },
  methods: {
    async sendMessage(value, event) {
      event.preventDefault()
      const response = await this.$axios.post('http://localhost:8000/api/chat/save', {text: value})
      const { data }  = response.data.original
      if (data) {
        this.comments.push(data)
        this.message = ''
      }
    },
  }
}
</script>

<style scoped>
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font: 13px Helvetica, Arial; }
form { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
form input { border: 0; padding: 10px; width: 90%; margin-right: 0.5%; }
form button { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }
#messages { list-style-type: none; margin: 0; padding: 0; }
#messages li { padding: 5px 10px; }
#messages li:nth-child(odd) { background: #eee; }

</style>
