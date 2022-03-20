<template>
    <div>
        <router-link :to="'/'">Dashboard</router-link>
        <h1>login</h1>
        <form @submit.prevent="login">
            <input type="email" name="email" v-model="email">
            <input type="password" name="password" v-model="password">
            <button type="submit">Se connecter</button>
        </form>
    </div>
</template>

<script>
import store from '../store';
export default {
    data() {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        login() {
            axios.post('api/login', {
                email: this.email,
                password: this.password
            })
                .then(res => {
                    store.state.user.token = res.data.token;
                    console.log(store.state.user.token);
                })
                .catch(err => console.log(err));
        }
    }
}
</script>