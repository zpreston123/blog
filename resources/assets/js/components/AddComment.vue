<template>
	<div class="message">
		<div class="message-header">
			Add a Comment
		</div>
		<div class="message-body">
			<form @submit.prevent="onSubmit">
				<div class="control is-grouped">
					<p class="control is-expanded">
						<input v-model="comment.body" class="input" type="text">
					</p>
					<p class="control">
						<button type="submit" class="button is-info">Submit</button>
					</p>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['postId'],
		data() {
			return {
				comment: {
					body: ''
				}
			};
		},
		methods: {
			onSubmit() {
				if (this.comment.body == '') {
					flash('danger', 'Comment cannot be empty! Please try again.');
					return false;
				}

				axios.post('/posts/' + this.postId + '/comments', this.comment).then((response) => {
					this.$emit('submitted', response.data);
					this.comment.body = '';
					flash('success', 'Comment added successfully!');
				}, (response) => {
					flash('danger', 'Problem submitting comment. Please try again.');
				});
			}
		}
	}
</script>
