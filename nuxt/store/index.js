export const actions = {
  async nuxtServerInit ({ commit }, { app }) {
    await app.$axios.$get('auth/current_user')
      .then(user => commit('user/setUser', user))
      .catch(() => commit('user/setUser', null))
  }
}



// data() {
//   return {
//     response: null,
//     html: null,
//   }
// },
// // methods: {
// //   async send(method) {
// //     // CookieからXSRF Token取得
// //     let csrftoken = null;
// //     let cookies = document.cookie.split(";");
// //     for (const cookie of cookies) {
// //       const keyvalue = cookie.split("=");
// //       if (keyvalue[0].trim() == "XSRF-TOKEN") {
// //
// //         csrftoken = keyvalue[1];
// //         break;
// //       }
// //     }
// //
// //     // CSRF Token
// //     const headers = {
// //       "X-CSRF-TOKEN": decodeURIComponent(csrftoken)
// //     };
// //     // 各メソッド別送信
// //     if (method == "LOGOUT") {
// //       const response = await this.$axios.post("http://localhost:8000/api/auth/logout");
// //       this.response = response.data;
// //     } else if (method == "LOGIN") {
// //       const response = await this.$axios.post("http://localhost:8000/api/auth/login", {name: 'test', email: 'test@gmail.com', password: '5927ffpa'}, { headers: headers });
// //       this.response = response.data;
// //     } else if (method == "ME") {
// //       const response = await this.$axios.get("http://localhost:8000/api/auth/me", {}, { headers: headers });
// //       this.response = response.data;
// //     } else if (method == "SAVE") {
// //       const response = await this.$axios.post("http://localhost:8000/api/auth/save", {content: 'test'},{ headers: headers });
// //       this.response = response.data;
// //     }
// //   },
// // },
