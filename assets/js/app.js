import Vue from 'vue'
import store from './store'
import router from './routing'
import App from './views/App'

Vue.config.productionTip = false

store.dispatch('initPartners')
store.dispatch('initCategories')
store.dispatch('initCountries')

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#locator')
