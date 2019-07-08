
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vue-multiselect/dist/vue-multiselect.min.css');


window.Vue = require('vue');

import VueProgressBar from 'vue-progressbar';
import Swal from 'sweetalert2';
import VModal from 'vue-js-modal';
import Turbolinks from 'turbolinks';
import TurbolinksAdapter from 'vue-turbolinks';

Turbolinks.start();

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '3px'
});

Vue.use(VModal);

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000
});

window.Toast=Toast;

window.Swal=Swal;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('menu-container', require('./modules/MenuContainer.vue').default);
Vue.component('card-main', require('./components/CardMain.vue').default);
Vue.component('menu-group', require('./modules/MenuGroups.vue').default);
Vue.component('menu-add', require('./modules/MenuAddForm.vue').default);
Vue.component('hotel-group', require('./modules/HotelGroup.vue').default);
Vue.component('hotel-form', require('./modules/HotelAddForm.vue').default);
Vue.component('order-group', require('./modules/OrderGroup.vue').default);
Vue.component('order-form', require('./modules/OrderForm.vue').default);
Vue.component('order-menu', require('./modules/OrderMenu.vue').default);
Vue.component('order-details', require('./modules/OrderDetails.vue').default);

Vue.component('menu-items', require('./modules/MenuItems.vue').default);
Vue.component('menu-search', require('./modules/MenuSearch.vue').default);


Vue.component('main-footer', require('./modules/MainFooter.vue').default);



window.eventBus=new Vue({});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
document.addEventListener('turbolinks:load', () => {

var element = document.getElementById("app");
if (element != null) {


const app = new Vue({
    el: element
});

}



});

