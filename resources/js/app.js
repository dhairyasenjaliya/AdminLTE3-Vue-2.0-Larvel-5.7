
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


//npm install axios --save axios

//Vue-forms  npm i vue-form

window.Form =  Form;
import { Form , HasError, AlertError } from 'vform'
  
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// Upload and convert base64 string to image   http://image.intervention.io/getting_started/installation
//php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravel5"


//Filter Data npm install moment

Vue.filter('upText', function(text){
  return text.charAt(0).toUpperCase() + text.slice(1);
});

import moment from 'moment'

Vue.filter('myDate',function(created){
  return moment(created).format('MMMM Do YYYY');
});


//Progress Bar   npm install vue-progressbar

import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '13px'
})

// Sweet alerts npm install sweetalert2

import swal from 'sweetalert2'
window.swal =  swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast =  toast;
 

//Passport in vue

Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);



//Fetch Data using Custom event

window.Fire = new Vue();


//Route npm install vue-router

import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/users', component: require('./components/Users.vue').default   },
    { path: '/profile', component: require('./components/Profile.vue').default   },
    { path: '/developer', component: require('./components/Developer.vue').default   }
  ]

  const router = new VueRouter({
    mode : 'history',
    routes // short for `routes: routes`
  })

 
const app = new Vue({
    el: '#app',
    router
})
