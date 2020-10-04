<template>
<div>
  <p>next page</p>
  {{ $store.state.token}}
</div>


</template>

<script>


export default {
  async asyncData({$axios, store}) {
  },
  data() {
    return {
      response: null,
      html: null,
    }
  },
  created() {
    const setCached =
      {
        title: 'こんにちは！タイトルをキャッシュします',
        content: 'こんにちは！内容をキャッシュします。'
      }
    this.$cookies.set('article01', setCached, {
      path: '/',
      maxAge: 60 * 60 * 24 * 7
    })
  }
}
</script>
