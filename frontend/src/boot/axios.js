import Vue from 'vue'
import axios from 'axios'
import router from '../router'

axios.defaults.baseURL = 'http://127.0.0.1:8000/'

// Add a token to each call if it has one
axios.interceptors.request.use(function (config) {
  const token = localStorage.getItem('accessToken')
  config.headers.Authorization = `Bearer ${token}`
  return config
})

// Check axios calls for a 401 (unAuth). if so go to login
axios.interceptors.response.use(function (response) {
  return response
}, function (error) {
  // if a call fails with a 401 remove the token and logout
  if (error && error.response && error.response.status && error.response.status === 401) {
    localStorage.removeItem('accessToken')
    router.push('')
  }
  return Promise.reject(error)
})
Vue.prototype.$axios = axios
