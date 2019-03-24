<template>
    <a class="button is-link is-outlined tooltip" data-tooltip="Like Post" v-if="!isLiked" @click.prevent="like">
        <i class="far fa-heart"></i>
        &nbsp;<span v-text="count"></span>
    </a>
    <a class="button is-link tooltip" data-tooltip="Unlike Post" v-else @click.prevent="unlike">
        <i class="fas fa-heart"></i>
        &nbsp;<span v-text="count"></span>
    </a>
</template>

<script>
    export default {
        props: ['post'],
        data() {
            return {
                isLiked: this.post.liked,
                count: this.post.likesCount
            };
        },
        methods: {
            like() {
                axios.get(`/posts/${this.post.id}/like`)
                    .then(response => {
                        this.isLiked = response.data.liked;
                        this.count = response.data.likesCount;
                        flash('Post liked!');
                    }, response => {
                        flash('Problem liking post. Please try again.', 'danger');
                    });
            },
            unlike() {
                axios.get(`/posts/${this.post.id}/unlike`)
                    .then(response => {
                        this.isLiked = response.data.liked;
                        this.count = response.data.likesCount;
                        flash('Post unliked.');
                    }, response => {
                        flash('Problem unliking post. Please try again.', 'danger');
                    });
            }
        }
    };
</script>
