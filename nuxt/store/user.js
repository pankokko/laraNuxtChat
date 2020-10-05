export const state = () => ({
    user: {
      name: '',
      email: '',
    }
})

export const mutations = {
  setUser(state, payLoad) {
    state.name = payLoad.user.name
    state.email = payLoad.user.email
  },
}
