<template>

    <div>
    <headerComponent/>
    <div style="margin-top: 5rem">
        <ul class="navbar-nav ml-auto mt-5">
            <li class="nav-item active">
                <router-link class="nav-link" to="/top">{{__('message.home')}}</router-link>
                <v-icon name="arrow-right" class="text-right d-md-none"></v-icon>
            </li>
            <li class="nav-item active">
                <router-link class="nav-link" to="/about">{{__('message.about')}}</router-link>
                <v-icon name="arrow-right" class="text-right d-md-none"></v-icon>
            </li>
            <li class="nav-item active">
                <router-link class="nav-link" to="/guide">{{ __('message.guide') }}</router-link>
                <v-icon name="arrow-right" class="text-right d-md-none"></v-icon>
            </li>
            <li class="nav-item active">
                <router-link class="nav-link" to="/question-and-answer">{{__('message.qa')}}</router-link>
                <v-icon name="arrow-right" class="text-right d-md-none"></v-icon>
            </li>
            <li class="nav-item active">
                <router-link class="nav-link" to="/contact">{{__('message.contact')}}</router-link>
                <v-icon name="arrow-right" class="text-right d-md-none"></v-icon>
            </li>
            <li class="nav-item active">
                <router-link class="nav-link" to="/my-page">{{__('message.my_page')}}</router-link>
                <v-icon name="arrow-right" class="text-right d-md-none"></v-icon>
            </li>
            <li class="nav-item dropdown" v-if="isAuthenticated">
                <a class="nav-link" @click="logout">ログアウト</a>
            </li>
            <li class="nav-item" v-else >
                <a class="nav-link" @click="showLoginModal">ログイン</a>
            </li>
        </ul>
    </div>
        
    </div>
</template>
<script>
import headerComponent from '../components/headerComponent'
import { mapGetters } from 'vuex'
export default {
    name : 'navigation',
    computed: {
        ...mapGetters({
            isAuthenticated: 'auth/isAuthenticated'
        })
    },
    methods:{
        logout(){
            localStorage.removeItem('token')
            localStorage.removeItem('user')
            this.$store.commit('auth/REMOVE_AUTH')
        },
        showLoginModal(){
            this.$store.commit('TOGGLE_LOGIN_MODAL', true)
        }
    },
    components : { headerComponent}
}
</script>
<style scoped>
 .nav-item{
    border-bottom: 1px solid #ccc;
    display : flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
}
ul {
    background : #fff;
    padding : 1rem;
}
.nav-link {
    color : #555;
    width: 100%;
}
</style>