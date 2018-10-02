
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
 */
 //import slick from "slick-carousel";

window.Slick = require('slick-carousel'); 



$(document).ready(function() {
    
  $(".ui-slick-carousel").slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    arrows: true
  });

  //Bootstrap Elements

  $(function() {
    $('[data-toggle="popover"]').popover();
  });
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
});
