<template>
    <div>
        <headerComponent/>
        <div style="background: #b2cef6; height: 80vh" class="py-4">
            <div class="container py-5" style="padding-bottom : 290px; ">
                <h3 class="text-center py-3">{{getCurrentUser.first_name}}{{getCurrentUser.last_name}}{{__('message.title_my_page')}}</h3>
                <ul class="navbar-nav ml-auto mt-3">
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/my-page/customer">{{__('message.customer')}}</router-link>
                        <v-icon name="arrow-right" class="text-right "></v-icon>
                    </li>
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/my-page/order-history">{{__('message.order_history')}}</router-link>
                        <v-icon name="arrow-right" class="text-right "></v-icon>
                    </li>
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/my-page/cart">{{ __('message.cart') }}</router-link>
                        <v-icon name="arrow-right" class="text-right "></v-icon>
                    </li>
                    
                </ul>
            </div>
            <div class="text-center my-5">
            <router-link :to="{path : '/menu'}" class="btn btn-secondary w-xs-75 w-md-25 w-25">戻る</router-link>
            </div>
        </div>
        
        
            <footerComponent/>
       
    </div>
</template>
<script>
import headerComponent from '../../components/headerComponent'
import footerComponent from '../../components/footerComponent'
import { mapGetters } from 'vuex'
export default {
    name : "mypage",
    mounted() {
        console.log('Component mounted.')
    },
    computed:{
        ...mapGetters({
            getCurrentUser: 'auth/getCurrentUser'
        })
    },
    components: { headerComponent , footerComponent},
        
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