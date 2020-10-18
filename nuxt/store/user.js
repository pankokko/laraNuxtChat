export const state = () => ({
    user: null
})

export const mutations = {
  setUser (state, user) {
    state.user = user
  }
}

export const actions = {
  async login ({ commit }, { email, password }) {
    const response = await this.$axios.$post('/auth/login', { email, password })
      .catch(err => {
        console.log(err)
      })
    commit('setUser', response)
  },
  async logout ({ commit }) {
    await this.$axios.post('http://localhost:8000/api/auth/logout')
      .catch(err => {
        console.log(err)
      })
      this.$cookies.remove('jwt')
      commit('setUser', null)
  },
}
