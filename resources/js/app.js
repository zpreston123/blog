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

	const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

	if ($navbarBurgers.length > 0) {
		$navbarBurgers.forEach(el => {
			el.addEventListener('click', () => {
				const target = el.dataset.target;
				const $target = document.getElementById(target);

				el.classList.toggle('is-active');
				$target.classList.toggle('is-active');
			});
		});
	}
});
