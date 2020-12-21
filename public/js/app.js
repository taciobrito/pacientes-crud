axios.defaults.headers.common['Content-Type'] = 'application/json';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

interceptors.setup();

var app = new Vue({
  el: '#app',
  ...objetoVue
});