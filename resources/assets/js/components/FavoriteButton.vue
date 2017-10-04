<template>
    <span>
        <a href="#" title="Mark as Unfavorite" v-if="favorited" @click.prevent="unfavorite">
            <i class="fa fa-heart"></i>
        </a>
        <a href="#" title="Mark as Favorite" v-else @click.prevent="favorite">
            <i class="fa fa-heart-o"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['dataFavorite', 'post'],
        data() {
            return {
                favoritedPost: this.dataFavorite,
            }
        },
        computed: {
            favorited() {
                return this.favoritedPost !== null;
            },
        },
        methods: {
            favorite() {
                axios.post('/favorites', {post_id: this.post.id})
                    .then(response => {
                        this.favoritedPost = response.data
                        flash('Post favorited!');
                    }, response => {
                        flash('Problem favoriting post. Please try again.', 'danger');
                    });
            },
            unfavorite() {
                axios.delete(`/favorites/${this.favoritedPost.id}`)
                    .then(response => {
                        this.favoritedPost = null;
                        flash('Post unfavorited.');
                    }, response => {
                        flash('Problem unfavoriting post. Please try again.', 'danger');
                    });
            }
        }
    }
</script>
