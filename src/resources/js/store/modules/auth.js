export const auth = {
    namespaced: true,
    state:{
        token: localStorage.getItem('token') || null,
        user: JSON.parse(localStorage.getItem('user')) || null,
    },
    mutations:{
        SET_TOKEN(state, token){
            state.token = token
        },
        SET_USER(state, user){
            state.user = user
        },
        REMOVE_AUTH(state){
            state.user = null
            state.token = null
        }
    },
    actions: {
        login({ commit }, token){
            commit('SET_TOKEN', token)
        },
        getCurrentUser({ commit }, user){
            commit('SET_USER', user)
        }
    },
    getters:{
        isAuthenticated (state){
            return state.token && state.user ? true : false
        },
        getCurrentUser(state){
            return state.user
        },
        getAuthToken (state){
            return state.token
        }
    }
}