

require('./bootstrap');

window.Vue = require('vue');
window.Fire = new Vue();
// vform
import  Form from "vform";
window.Form = Form;
// Vue.component(HasError.name, HasError);

//sweet alert
import Swal from 'sweetalert2'
import Axios from 'axios';
window.swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-start',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.toast = Toast

//VueProgressBar
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
    color: '#1BC5BD',
    failedColor: 'red',
    height: '3px'
})
//filters
Vue.filter("shortcut", function(value) {
    if(value.length > 50)
    return value.slice(0,50)+'....'
    else 
    return value.slice(0,50)
});





Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component("pagination", require("laravel-vue-pagination"));
Vue.component('cats', require('./components/Cats.vue').default);
Vue.component('users', require('./components/Users.vue').default);
Vue.component('services', require('./components/Services.vue').default);
Vue.component('faqs', require('./components/Faqs.vue').default);
Vue.component('settings', require('./components/Settings.vue').default);
Vue.component('blogs', require('./components/Blogs.vue').default);
Vue.component('orders', require('./components/Orders.vue').default);
Vue.component('profile', require('./components/Profile.vue').default);
// home components
Vue.component('service-filter', require('./components/Home/ServiceFilter.vue').default);
Vue.component('enter-details', require('./components/Home/EnterDetails.vue').default);




const app = new Vue({
    el: '#app',
});
