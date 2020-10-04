<template>
  <div>
    <article v-if="article">
      <h1>{{ article.title }}</h1>
      <p>{{ article.content }}</p>
    </article>
    <h1>Nuxt</h1>
    <button @click="send('GET')">Axios GET</button>
    <button @click="send('LOGIN')">Axios LOGIN</button>
    <button @click="send('ME')">Axios Me</button>
<!--    <button @click="send('DELETE')">Axios DELETE</button>-->
    <div>{{ response }}</div>
    <div v-html="html"></div>
    <nuxt-link to="two">次へ</nuxt-link>

    <p>{{$store.state.token}}</p>
  </div>
</template>

<script>

export default {
  async asyncData({ $axios, store }) {
    console.log(store.state.counter)
  },
  data() {
    return {
      response: null,
      html: null,
      article01: this.$cookies.get('article01')
    }
  },
  methods: {
    async send(method) {
      // CookieからXSRF Token取得
      let csrftoken = null;
      let cookies = document.cookie.split(";");
      for (const cookie of cookies) {
        const keyvalue = cookie.split("=");
        if (keyvalue[0].trim() == "XSRF-TOKEN") {

          csrftoken = keyvalue[1];
          break;
        }
      }

      // CSRF Token
      const headers = {
        "X-CSRF-TOKEN": decodeURIComponent(csrftoken)
      };
      // 各メソッド別送信
      if (method == "GET") {
        const response = await this.$axios.get("http://localhost:8000/api/get/");
        this.response = response.data;
      } else if (method == "LOGIN") {
        const response = await this.$axios.post("http://localhost:8000/api/auth/login", {name: 'test', email: 'test@test.com', password: 'testtest'}, { headers: headers });
        this.response = response.data;
      } else if (method == "ME") {
        const response = await this.$axios.get("http://localhost:8000/api/auth/me", {}, { headers: headers });
        this.response = response.data;
      } else if (method == "DELETE") {
        const response = await this.$axios.delete("http://localhost:8000/api/remove/", { headers: headers });
        this.response = response.data;
      }
    },
    increase(){
      this.$store.commit('increment')
    }
  },
  computed: {
    article() {
      let post
      if (this.article01) {
        post = JSON.parse(this.article01)
      }
      return post
    }
  }
}
</script>
