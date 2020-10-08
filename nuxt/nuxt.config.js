require('dotenv').config()

export default {
  // Global page headers (https://go.nuxtjs.dev/config-head)
  server: {
    port: 3000,
    host: '0.0.0.0'
  },
  router: {
    base: '/nuxt/'
  },
  head: {
    title: 'nuxt',
    meta: [
      {charset: 'utf-8'},
      {name: 'viewport', content: 'width=device-width, initial-scale=1'},
      {hid: 'description', name: 'description', content: ''}
    ],
    link: [
      {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'},
      {rel: 'stylesheet', href: 'https://use.fontawesome.com/releases/v5.2.0/css/all.css'}
    ]
  },
  axios: {
    //追加
    baseURL: process.env.API_URL,
    //追加
    credentials: true
  },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: [],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: ['@/plugins/axios'],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
    // '@nuxtjs/vuetify',
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/dotenv',
    'nuxt-buefy',
    ['cookie-universal-nuxt', {parseJSON: false}]
  ],

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {}
}
