<template>
    <router-link :to="'/login'">Login</router-link>
    <h1>Dashboard</h1>
    <button @click="getInformations">Obtenir mes informations</button>
</template>

<script>
import axiosClient from '../axios';
export default {
    name: "Dashboard",
    methods: {
        getInformations() {
            axiosClient.post('/privateInformations')
                .then(res => console.log(res))
                .catch(err => console.log(err));
        }
    }
}
</script>