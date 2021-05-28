<template>
    <div>
        <headerComponent/>
        <div class="container" style="margin-top: 5rem">
            <h1 class="text-center">{{__('message.customer')}}</h1>
            <h2><a href="" class=" d-block text-center">{{__('message.mypage_info')}}</a></h2>
            <div class="row my-4 justify-content-center">
                <div class="col-4">{{__('message.username')}}</div>
                <div class="col-6">{{getCurrentUser.email}}</div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-4">{{__('message.password')}}</div>
                <div class="col-6">********</div>
            </div>
            <h3 class="my-4"><a href="" class=" d-block text-center">{{__('message.imformation_register')}}</a></h3>
            <div class="row my-4 justify-content-center">
                <div class="col-4">{{__('message.name')}}</div>
                <div class="col-6">
                    <p>{{getCurrentUser.first_name}}{{getCurrentUser.last_name}}</p>
                    <p>{{getCurrentUser.first_name_furigana}}{{getCurrentUser.last_name_furigana}}</p>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-4">{{__('message.address')}}</div>
                <div class="col-6">{{getCurrentUser.address}}</div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-4">{{__('message.phone_number')}}</div>
                <div class="col-6">{{getCurrentUser.phone_number}}</div>
            </div>
            <div class="photo-spot">
                <v-icon name="info-circle" style="color: red"/>
                <p>お客様情報の変更は、</p>
                <p>Photo Spot マイページよりお手続きいただけます</p>
                <a href="https://www.photospot.jp/" target="_blank">https://www.photospot.jp/</a>
            </div>
        </div>
        <div class="text-center my-5">
            <router-link to="/my-page" class="btn btn-secondary w-xs-75 w-md-25 w-25">戻る</router-link>
        </div>
        <footerComponent/>
    </div>
</template>
<script>
import headerComponent from '../../components/headerComponent'
import footerComponent from '../../components/footerComponent'
import backComponent from '../../components/BackComponent'
import { mapGetters } from 'vuex'
export default {
    name : "mypage",
    computed:{
        ...mapGetters({
            getCurrentUser: 'auth/getCurrentUser'
        })
    },
    components: { headerComponent , footerComponent , backComponent},
        
}
</script>
<style scoped>

.photo-spot{
    padding: 10px 30px;
    text-align: center;
    border: solid red 1px;
    margin: 20px 0;
}
.photo-spot > p{
    margin-bottom: 0;
    color: red;
}
</style>