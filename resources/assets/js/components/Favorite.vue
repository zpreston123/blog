<template>
    <span>
        <a href="#" title="Mark as Unfavorite" v-if="isFavorited" @click.prevent="unFavorite(post)">
            <i class="fa fa-heart"></i>
        </a>
        <a href="#" title="Mark as Favorite" v-else @click.prevent="favorite(post)">
            <i class="fa fa-heart-o"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['post', 'favorited'],
        data: function() {
            return {
                isFavorited: '',
            }
        },
        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },
        computed: {
            isFavorite() {
                return this.favorited;
            },
        },
        methods: {
            favorite(post) {
                axios.post('/favorite/' + post)
                    .then((response) => {
                        this.isFavorited = true;
                        flash('success', 'Post marked as favorite!');
                    })
                    .catch((response) => console.log(response.data));
            },
            unFavorite(post) {
                axios.post('/unfavorite/' + post)
                    .then((response) => {
                        this.isFavorited = false;
                        flash('success', 'Post marked as unfavorite!');
                    })
                    .catch((response) => console.log(response.data));
            }
        }
    }
</script>
