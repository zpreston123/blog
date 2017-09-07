<template>
    <span>
        <a href="#" title="Mark as Unfavorite" v-if="isFavorited" @click.prevent="unfavorite(post)">
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
                axios.post('/favorite/' + post);
                this.isFavorited = true;
                flash('Favorited!');
            },
            unfavorite(post) {
                axios.post('/unfavorite/' + post);
                this.isFavorited = false;
                flash('Favorite Removed.');
            }
        }
    }
</script>
