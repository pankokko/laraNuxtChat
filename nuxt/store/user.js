export const state = () => ({
    user: null
})


export const mutations = {
  setUser (state, user) {
    console.log(user)
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
  }
}
