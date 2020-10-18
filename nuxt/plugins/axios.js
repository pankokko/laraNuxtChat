export let axios;
import { SetCookie, GetCookie } from '@/services/token';

export default ({ store, $axios, $cookies }) => {
  //XMLHttpRequestをつけないとAPI側でAjaxか判定できないため付与
  $axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

  $axios.onRequest(config => {
    const token = GetCookie( 'jwt', $cookies)
    config.headers.common['Authorization'] = `Bearer ${token}`;
    config.headers.common['Accept'] = 'application/json';
  });

  $axios.onResponse(response => {
    if(!($cookies.get('jwt'))) {
      SetCookie(response.data.access_token, $cookies)
      }
    store.commit('user/setUser', response.data)
    return Promise.resolve(response);
  })

  $axios.onError(error => {
    return Promise.reject(error.response);
  });

  axios = $axios;
}
