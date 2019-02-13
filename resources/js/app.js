
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


//Route

import VueRouter from 'vue-router'

Vue.use(VueRouter)

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default   }
  ]

  const router = new VueRouter({
    routes // short for `routes: routes`
  })


const app = new Vue({
    el: '#app',
    router
})
