export default function ({$axios}, inject) {
  const api = new API($axios)

  inject('api', api)
}

class API {
  constructor(axios) {
    this.axios = axios
  }

  async getAllInfo() {
    try {
      return await this.axios.$get('http://localhost:8000/api/chat/all_info')
    } catch (error) {
      throw new Error('Error is occured', error)
    }
  }

  async postMessage(data) {
    try {
      return await this.axios.post('http://localhost:8000/api/chat/save', data)
    } catch (error) {
      throw new Error('Error is occured', error)
    }
  }

  async createGroup(data) {
    try {
      return await this.axios.post('http://localhost:8000/api/chat/group/create', data);
    } catch (error) {
      throw new Error('Error is occured', error)
    }
  }
}
