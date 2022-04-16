<template>
    <router-link :to="'/login'">Login</router-link>
    <h1 v-if="isAdmin">Bienvenue Administrateur!</h1>
    <h1 v-else>Dashboard</h1>
    <button @click="getInformations">Obtenir mes informations</button>
</template>

<script>
import { computed, onMounted } from '@vue/runtime-core';
import axiosClient from '../axios';
import store from '../store';

export default {
    setup() {
        const getRole = async () => {
            await store.dispatch('getRole');
        }

        const getInformations = async () => {
            await axiosClient.post('/privateInformations')
                .then(res => console.log(res))
                .catch(err => console.log(err));
        }

        onMounted(getRole());
        
        return {
            isAdmin: computed(() => store.state.user.data.role),
            getInformations
        }
    }
}
</script>