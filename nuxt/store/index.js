export const state = () => ({
  token: '',
  counter: 0
})

export const mutations = {
  increment(state) {
    state.counter++
  },
  setToken(state, payLoad) {
    // console.log(payLoad)
    state.token = payLoad
  }
}
