
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

let user = document.head.querySelector('meta[name="user"]');
console.log(user);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import 'es6-promise/auto'

import BootstrapVue from 'bootstrap-vue';
import App from './App.vue';
import router from './router';

import VueFormGenerator from 'vue-form-generator'

import store from './store'

Vue.use(VueFormGenerator)



//auth
import Auth from './auth/Auth.js';

Vue.component('App', require('./App.vue'));

//passport default component
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

Vue.use(BootstrapVue);
Vue.use(Auth);


// set up the beforeEach middleware on the router that checks each route before going to it. The method takes these variables:

// to – the route you want to move to.
// from – the current route you are moving away from.
// next – the method that finally moves to a defined route. 
//When called without a route passed, it continues the navigation. If given a route, it goes to that route.

router.beforeEach((to, from, next) => {
  if(to.matched.some(record => record.meta.requiresAuth)) {
    
  
    if(Vue.auth.isAuth()) {
      console.log(console.log(to.path))
      // if(to.path !== '/dashboard') {
      //   //console.log(console.log(to.path))
      //   next('/dashboard')
 
      // } else {
      //   next();
      // }
      next();
      
      //return next();
      
      
    } else if (!Vue.auth.isAuth()) {
     // console.log(Vue.auth.isAuth());
      next({ 
        path:'/login',
        // query: { redirect: to.fullPath }
      })
      return;
    }
    next();
    
  } 
    next();
  
})

/* eslint-disable no-new */
new Vue({
    el: '#app',
    store,
    router,
    template: '<App/>',
    components: {
      App
    }
  })
