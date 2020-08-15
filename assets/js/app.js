import Vue from 'vue'
import store from './store'
import router from './routing'
import App from './views/App'
import i18n from './i18n'

Vue.config.productionTip = false

store.dispatch('initPartners')
store.dispatch('initCategories')
store.dispatch('initCountries')

new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount('#locator')
