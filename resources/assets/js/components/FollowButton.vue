<template>
    <button class="button is-danger" v-if="followed" @click.prevent="unfollow">Unfollow</button>
    <button class="button is-success" v-else @click.prevent="follow">Follow</button>
</template>

<script>
    export default {
        props: ['dataFollower', 'user'],
        data() {
            return {
                followedUser: this.dataFollower,
            }
        },
        computed: {
            followed() {
                return this.followedUser !== null;
            },
        },
        methods: {
            follow() {
                axios.post('/followers', {user_id: this.user.id})
                    .then(response => {
                        this.followedUser = response.data;
                        flash('You are now following this user.');
                    }, response => {
                        flash('Problem following user. Please try again.', 'danger');
                    });
            },
            unfollow() {
                axios.delete(`/followers/${this.followedUser.id}`)
                    .then(response => {
                        this.followedUser = null;
                        flash('You have unfollowed this user.');
                    }, response => {
                        flash('Problem unfollowing user. Please try again.', 'danger');
                    });
            }
        }
    }
</script>
