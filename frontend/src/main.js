import Vue from 'vue'
import App from './App.vue'
import router from './config/router'
import store from './config/store'
import './config/axios'

Vue.config.productionTip = false

new Vue({
  store,
  router,
  render: h => h(App),
}).$mount('#app')
