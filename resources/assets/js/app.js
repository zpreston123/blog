
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.events = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('comments', require('./components/Comments.vue'));
Vue.component('favorite-button', require('./components/FavoriteButton.vue'));
Vue.component('flash-message', require('./components/FlashMessage.vue'));
Vue.component('follow-button', require('./components/FollowButton.vue'));

const app = new Vue({
	el: '#app'
});

const navbarBurger = document.querySelector('.navbar-burger');

navbarBurger.addEventListener('click', () => {
	const target = this.dataset.target;
	const $target = document.getElementById(target);

	this.classList.toggle('is-active');
	$target.classList.toggle('is-active');
});
