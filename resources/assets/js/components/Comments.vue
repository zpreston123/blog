<template>
    <div>
        <form @submit.prevent="addComment">
            <div class="control is-grouped">
                <p class="control is-expanded">
                    <input v-model="comment.body" class="input" type="text" placeholder="Add a comment...">
                </p>
                <p class="control">
                    <button type="submit" class="button is-info">Submit</button>
                </p>
            </div>
        </form>

        <hr>

        <div class="box" v-if="comments.length != 0">
            <article class="media" v-for="comment in comments">
                <figure class="media-left">
                    <p class="image is-64x64">
                        <img :src="comment.author.avatar" :alt="comment.author.name">
                    </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>{{ comment.author.name }}</strong> <small>{{ comment.created_at }}</small>
                            <br>
                            {{ comment.body }}
                        </p>
                    </div>
                </div>
                <div class="media-right">
                    <button class="delete" @click="deleteComment(comment.id)"></button>
                </div>
            </article>
        </div>
        <p v-else>No comments are available.</p>
    </div>
</template>

<script>
    export default {
        props: ['post-id'],
        data() {
            return {
                comment: {
                    id: '',
                    body: ''
                },
                comments: [],
            };
        },
        methods: {
            fetchComments() {
                this.$http.get('/posts/' + this.postId + '/comments').then((response) => {
                    this.comments = response.data;
                });
            },
            addComment() {
                this.$http.post('/posts/' + this.postId + '/comments', this.comment).then((response) => {
                    this.comment.body = '';
                    this.fetchComments();
                });
            },
            deleteComment(id) {
                if (confirm('Are you sure you want to delete this comment?')) {
                    this.$http.delete('/posts/' + this.postId + '/comments/' + id).then((response) => {
                        alert('Comment deleted!');
                        this.fetchComments();
                    });
                }
            }
        },
        mounted() {
            this.fetchComments();
        }
    }
</script>
