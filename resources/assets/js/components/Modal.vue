<template>
	<div class="modal" v-show="isVisible">
		<div class="modal-background"></div>
		<div class="modal-content">
			<slot></slot>
		</div>
		<button class="modal-close" @click="isVisible = false"></button>
	</div>
</template>

<script>
	export default {
		data() {
			isVisible: false
		}
	}
</script>
