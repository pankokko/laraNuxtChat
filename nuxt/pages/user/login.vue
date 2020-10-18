<template>
  <section>
    <h1>Login</h1>
    <form @submit.prevent="submit">
      <div>
        <label for="email">email</label>
        <input type="text" id="email" v-model="email" />
      </div>
      <div>
        <label for="password">password</label>
        <input type="password" id="password" v-model="password" />
      </div>
      <button type="submit">login</button>
    </form>
  </section>
</template>

<script>
export default {
  middleware: 'logined_user',
  data () {
    return {
      email: '',
      password: ''
    }
  },
  created(){
    console.log(this.$route)
  },
  methods: {
    async submit () {
      await this.$store.dispatch('user/login', {
        email: this.email,
        password: this.password
      })
      this.$router.push('/app')
    }
  }
}
</script>
<!--{name: 'test', email: 'test@gmail.com', password: '09210921'}-->
