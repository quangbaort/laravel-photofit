<template>
    <div id="app">
        <auth/>
        <header class="header fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light   ">
                <ul class="nav navbar-nav">
                    <li class="nav-item active" @click="showCart">
                        <a class="navbar-brand text-primary font-weight-bold">
                            <img :src="cart" alt="" class="img-fluid" style="width:60px ;">
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <img :src="logo" alt="" class="img-fluid" style="height:30px"/>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav text-center user-info">
                    <li class="nav-item" v-if="isAuthenticated">
                        <span>{{getCurrentUser.first_name}}{{getCurrentUser.last_name}}様</span>
                    </li>
                    <router-link to="/menu" v-if="this.$router.currentRoute.path != '/menu'" class="text-primary">
                        <v-icon name='bars' scale="2" ></v-icon>
                    </router-link>
                    <router-link to="/top" v-else class="text-primary">
                        <v-icon name='times' scale="2"></v-icon>
                    </router-link>
                </ul>

            </nav>
            <hr class="text-primary my-0" style="border-top:2px solid #3490dc;">

        </header>
    </div>
</template>
<script>

import auth from "./authComponent"
import logo from '../../images/logo.png'
import subMenuComponent from './subMenuComponent'
import { mapGetters } from 'vuex'
import cart from '../../images/cart.svg'
export default {
    name : "headerComponent",
    computed:{
        ...mapGetters({
            isAuthenticated: 'auth/isAuthenticated',
            isShowSubMenu: 'isShowSubMenu',
            getCurrentUser: 'auth/getCurrentUser'
        })
    },
    methods : {
        showCart() {
            var token = window.localStorage.getItem('token')
            if(token === undefined || token === null){
                this.$store.commit('TOGGLE_LOGIN_MODAL', true)
            }
            else {
                this.$router.push({name : 'cart'})
            }
        }
    },
    data() {    
        return {
            logo : logo,
            cart : cart
        }
    },
    components : {auth , subMenuComponent},
}
</script>
<style scoped>
button.navbar-toggler{
    border : none  !important;
}
.navbar-light .navbar-toggler {
    color : #3490dc !important;
}
hr{
    border-top : 1px solid #3490dc;
}
.collapse .nav-item{
    border-bottom: 1px solid #ccc;
    display : flex;
    align-items: center;
    justify-content: space-between;
}


.nav.navbar {
    justify-content: space-between !important;

}
nav {
flex-wrap: nowrap;
}
@media (min-width: 992px){
    .navbar-expand-lg .navbar-collapse {
        display: contents!important;
        justify-content: space-around;
        flex-basis: auto;
    }
    .collapse .nav-item{
        border : none;
    }

    .navbar-expand-lg {
        justify-content: space-between !important;
    }
}
ul.navbar-nav.ml-auto.text-center{
    transition: all 1s;
}
.user-info{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
}
.user-info > li{
    padding-right: 10px;
    color: #6c9bd2;
}
.bg-light{ 
background : #fff !important;
}
</style>
