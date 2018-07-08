
import Vue from 'vue'

import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)
Vue.use(BootstrapVue)

Vue.component('request-component', require('./components/RequestComponent.vue'));
Vue.component('navbar-component', require('./components/NavbarComponent.vue'));
Vue.component('requests-component', require('./components/RequestsComponent.vue'));
Vue.component('clients-component', require('./components/ClientsComponent.vue'));



const app = new Vue({
    el: '#app',
    mounted() {
    }
});
