<template>
    <div>
        <button class="button is-danger" v-if="isFollowed" @click="unfollow">Unfollow</button>
        <button class="button is-success" v-else @click="follow">Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['profile'],
        data() {
            return {
                isFollowed: this.profile.followedByAuthUser
            };
        },
        methods: {
            follow() {
                axios.get(`/profiles/${this.profile.id}/follow`)
                    .then(response => {
                        this.isFollowed = response.data.followedByAuthUser;
                        flash('You are now following this user.');
                    }, response => {
                        flash('Problem following user. Please try again.', 'danger');
                    });
            },
            unfollow() {
                axios.get(`/profiles/${this.profile.id}/unfollow`)
                    .then(response => {
                        this.isFollowed = response.data.followedByAuthUser;
                        flash('You have unfollowed this user.');
                    }, response => {
                        flash('Problem unfollowing user. Please try again.', 'danger');
                    });
            }
        }
    };
</script>
