import axiosClient from '../axios';
import { createStore } from "vuex";

const store = createStore({
    state: {
        user: {
            data: {
                role: null
            },
            token: localStorage.getItem('auth_token')
        }
    },
    actions: {
        getRole({ commit }) {
            axiosClient.get('getRole')
                .then( res => {
                    commit('setRole', res.data.role);
                })
                .catch( err => console.log(err));
        }
    },
    mutations: {
        setRole: (state, role) => {
            state.user.data.role = role;
        }
    }
});

export default store;