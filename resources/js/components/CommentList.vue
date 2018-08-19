<template>
    <div>
        <add-comment :post-id="postId" @submitted="addComment"></add-comment>

        <hr>

        <h3>Comments:</h3>

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
                            <strong>{{ comment.author.name }}</strong>
                            <small>{{ comment.created_at | ago }}</small><br>
                            {{ comment.body }}
                        </p>
                    </div>
                </div>
                <div class="media-right">
                    <button class="delete" @click="deleteComment(comment)"></button>
                </div>
            </article>
        </div>
        <p v-else>No comments exist! Be the first to create one.</p>
    </div>
</template>

<script>
    import AddComment from './AddComment.vue';

    export default {
        props: ['postId'],
        components: {
            AddComment
        },
        data() {
            return {
                comments: []
            };
        },
        filters: {
            ago(date) {
                return moment.utc(date).fromNow();
            }
        },
        methods: {
            fetchComments() {
                axios.get('/posts/' + this.postId + '/comments')
                    .then(response => {
                        this.comments = response.data;
                    }, response => {
                        flash('Problem fetching comments. Please refresh the page and try again.', 'danger');
                    });
            },
            addComment(comment) {
                this.comments.unshift(comment);
            },
            deleteComment(comment) {
                if (confirm('Are you sure you want to delete this comment?')) {
                    let index = this.comments.indexOf(comment);

                    axios.delete('/posts/' + this.postId + '/comments/' + comment.id)
                        .then(response => {
                            this.comments.splice(index, 1);
                            flash('Comment deleted successfully!');
                        }, response => {
                            flash('Problem deleting comment. Please try again.', 'danger');
                        });
                }
            }
        },
        mounted() {
            this.fetchComments();
        }
    }
</script>
