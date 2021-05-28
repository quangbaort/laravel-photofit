import axios from 'axios'
import {API_BASE_URL} from '../commons/constants'
axios.defaults.baseURL = API_BASE_URL

const callApi = (token) =>  axios.create({
  headers: {
    Authorization: `Bearer ${token}`,
    "content-type": "application/json",
  }
})

export {
    callApi
}
  