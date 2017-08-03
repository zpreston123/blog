<template>
	<article class="message flash" v-bind:class="'is-'+type" v-show="isVisible">
		<div class="message-body">
			{{ body }}&nbsp;&nbsp;<button class="delete" @click="isVisible=false"></button>
		</div>
	</article>
</template>

<script>
	export default {
		data() {
			return {
				type: 'success',
				body: '',
				isVisible: false
			};
		},

		created() {
			window.events.$on(
                'flash', data => this.flash(data)
            );
		},

		methods: {
			flash(data) {
				this.type = data.type;
				this.body = data.message;
				this.isVisible = true;
			}
		}
	}
</script>

<style>
	.flash {
		position: fixed;
		z-index: 10;
		bottom: 10px;
		right: 10px;
	}
</style>
