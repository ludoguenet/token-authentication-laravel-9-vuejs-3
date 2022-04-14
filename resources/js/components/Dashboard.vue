<template>
    <router-link :to="'/login'">Login</router-link>
    <h1 v-if="isAdmin()">Bienvenue Administrateur!</h1>
    <h1 v-else>Dashboard</h1>
    <button @click="getInformations">Obtenir mes informations</button>
</template>

<script>
import axiosClient from '../axios';
import store from '../store';

export default {
    name: "Dashboard",
    methods: {
        getInformations() {
            axiosClient.post('/privateInformations')
                .then(res => console.log(res))
                .catch(err => console.log(err));
        },
        isAdmin() {
            return store.state.user.data.role;
        }
    },
    mounted() {
        store.dispatch('getRole');
    }
}
</script>