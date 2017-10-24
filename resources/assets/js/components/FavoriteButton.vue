<template>
        <a class="button is-link tooltip" data-tooltip="Unfavorite Post" v-if="isFavorited" @click.prevent="unfavorite">
            <i class="fa fa-heart"></i>
            &nbsp;<span v-text="count"></span>
        </a>
        <a class="button is-link is-outlined tooltip" data-tooltip="Favorite Post" v-else @click.prevent="favorite">
            <i class="fa fa-heart-o"></i>
            &nbsp;<span v-text="count"></span>
        </a>
</template>

<script>
    export default {
        props: ['dataFavorite', 'post'],
        data() {
            return {
                favoritedPost: this.dataFavorite,
                isFavorited: this.post.is_favorited,
                count: this.post.favorites_count
            }
        },
        methods: {
            favorite() {
                axios.post('/favorites', {post_id: this.post.id})
                    .then(response => {
                        this.favoritedPost = response.data
                        this.isFavorited = true
                        this.count++
                        flash('Post favorited!')
                    }, response => {
                        flash('Problem favoriting post. Please try again.', 'danger')
                    });
            },
            unfavorite() {
                axios.delete(`/favorites/${this.favoritedPost.id}`)
                    .then(response => {
                        this.favoritedPost = null
                        this.isFavorited = false
                        this.count--
                        flash('Post unfavorited.')
                    }, response => {
                        flash('Problem unfavoriting post. Please try again.', 'danger')
                    });
            }
        }
    }
</script>
