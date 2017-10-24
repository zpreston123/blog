<template>
	<button
		type="submit"
		class="button"
		v-bind:class="{ 'is-loading': submitted }"
		@click="toggleSubmit"
		:disabled="submitted">
		<slot>Submit</slot>
	</button>
</template>

<script>
	export default {
		data() {
			return {
				submitted: false
			}
		},
		methods: {
			toggleSubmit() {
				this.submitted = true
			}
		}
	}
</script>
