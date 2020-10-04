export let axios;

export default ({ store, $axios, $cookies }) => {

  $axios.onRequest(config => {
    const token = $cookies.get('jwt')
    config.headers.common['Authorization'] = `Bearer ${token}`;
    config.headers.common['Accept'] = 'application/json';
  });

  $axios.onResponse(response => {
      if(!($cookies.get('jwt'))) {
        $cookies.set('jwt', response.data.access_token, {
          path: '/',
          maxAge: 60 * 60 * 24 * 7
        })
      }

    // store.commit('setToken', response.data.access_token)
    return Promise.resolve(response);
  })

  $axios.onError(error => {
    return Promise.reject(error.response);
  });

  axios = $axios;
}
