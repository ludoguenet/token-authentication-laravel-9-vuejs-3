import { createStore } from "vuex";

const store = createStore({
    state: {
        user: {
            data: {},
            token: null
        }
    }
});

export default store;