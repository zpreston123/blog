import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import BulmaTagsInput from '@creativebulma/bulma-tagsinput';
import mitt from 'mitt';

const app = createApp({});
const emitter = mitt();

app.config.globalProperties.emitter = emitter;

window.flash = function (message, type='success') {
    app.config.globalProperties.emitter.emit('flash', { message, type });
};

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});

app.mount('#app');

document.addEventListener('DOMContentLoaded', () => {
    BulmaTagsInput.attach();

	// Get all "navbar-burger" elements
	const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

	// Check if there are any navbar burgers
	if ($navbarBurgers.length > 0) {
		// Add a click event on each of them
		$navbarBurgers.forEach(el => {
			el.addEventListener('click', () => {
				// Get the target from the "data-target" attribute
				const target = el.dataset.target;
				const $target = document.getElementById(target);

				// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
				el.classList.toggle('is-active');
				$target.classList.toggle('is-active');
			});
		});
	}
});
