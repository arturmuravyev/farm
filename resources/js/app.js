require('./bootstrap');
import Vuetify from 'vuetify';

window.Vue = require('vue');

Vue.use(Vuetify);

Vue.component('front-page', require('./components/Front.vue').default);

const vuetifyOptions={};
const app = new Vue({
	el: '#app',
	vuetify: new Vuetify(vuetifyOptions),
});