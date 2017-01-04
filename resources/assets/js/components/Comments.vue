<template>
    <div class="box">
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
                <button class="delete" @click="deleteComment(comment)"></button>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        props: ['post-id'],
        data() {
            return {
                body: "",
                comments: []
            };
        },
        methods: {
            fetchComments(postId) {
                this.$http.get('/posts/' + postId + '/comments').then((response) => {
                    this.comments = response.data;
                });
            }
        },
        mounted() {
            this.fetchComments(this.postId);
        }
    }
</script>
