import authAPI from '../api/auth'
import store from '../store'

export default function ({ to, from, next}) {
    let token = localStorage.getItem('token')
    if(token){
        return authAPI.getCurrentUser(token).then((res) => {
            next()
            store.commit('TOGGLE_LOGIN_MODAL', false)
        }).catch((error) => {
            store.commit('auth/REMOVE_AUTH')
            localStorage.removeItem('token')
            localStorage.removeItem('user')
            store.commit('TOGGLE_LOGIN_MODAL', true)
            next({ 
                name: 'menu',
                query: { redirect: to.fullPath }
            })
        })
    } else{
        store.commit('auth/REMOVE_AUTH')
        localStorage.removeItem('token')
        localStorage.removeItem('user')
        store.commit('TOGGLE_LOGIN_MODAL', true)
        next({ 
            name: 'menu',
            query: { redirect: to.fullPath }
        })
    }
}