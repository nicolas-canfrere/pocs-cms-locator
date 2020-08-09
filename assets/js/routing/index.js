import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './../views/Home'
import SinglePartner from './../views/SinglePartner'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/partner/:id',
    name: 'single',
    component: SinglePartner
  }
]

const router = new VueRouter({
  scrollBehavior () {
    return { x: 0, y: 0 }
  },
  routes
})

export default router
