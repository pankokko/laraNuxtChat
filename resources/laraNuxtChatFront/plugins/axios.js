export let axios;

export default ({ store, $axios }) => {

  $axios.onRequest(config => {
     const token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYwMTY5MTIzMywiZXhwIjoxNjAxNjk0ODMzLCJuYmYiOjE2MDE2OTEyMzMsImp0aSI6IjM5bkd3eW9yOUk0emN5OGYiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.5suerPdQls99FaPVcFDj3ho4lXqkxUrVz9k-RO5AIWE"
    config.headers.common['Authorization'] = `Bearer ${token}`;
    config.headers.common['Accept'] = 'application/json';
  });

  $axios.onResponse(response => {
    return Promise.resolve(response);
  })

  $axios.onError(error => {
    return Promise.reject(error.response);
  });

  axios = $axios;
}
