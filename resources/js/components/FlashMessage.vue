<template>
	<article class="message flash" v-bind:class="'is-'+type" v-show="isVisible">
		<div class="message-body is-clearfix">
			<div class="is-pulled-left">
				<span v-bind:class="'icon has-text-'+type">
					<i class="fas fa-lg" v-bind:class="{
						'fa-check-circle': (type == 'success'),
						'fa-info-circle': (type == 'info'),
						'fa-exclamation-circle': (type == 'warning'),
						'fa-times-circle': (type == 'danger')
					}"></i>
				</span>
				{{ body }}
			</div>
			<div class="is-pulled-right" style="padding-left: 20px;">
				<button class="delete" @click="isVisible=false"></button>
			</div>
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
