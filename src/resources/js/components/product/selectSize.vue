<template>
    <div>
        <header-component/>
            <div class="container mt-5">
                <h2 class="text-center py-5">サイズを選んでください</h2>
                <p class="text-center text-danger font-weigth-bold">{{error}}</p>
                <div id="size" class="mb-5">
                    <div class="border-bottom my-4" v-for="size in sizes" :key="size.id">
                        <div class='py-3 d-flex'>
                            <input type="radio" v-bind:id="size.id" @click="checkChecked()"  name="size" class="m-2 d-inline-block"/>
                            <label v-bind:for="size.id">
                                <h4>{{ size.size }} ¥ <span class="text-danger">{{ formatterNumber(size.price) }}</span> <small class="text-small">(税込)</small></h4>
                            </label>
                        </div>
                        <p class="px-4">{{ size.description }}</p>
                    </div>
                </div>
                <div class="button-group-float">
                    <button class="btn btn-back" @click="back">戻る</button>
                    <button type="button" class="btn btn-submit w-75 " @click="submit()" v-if="!is_checked" v-bind:class="{ 'disable' : !is_checked }" >次へ</button>
                    <router-link :to="{name : 'selectBackground' , params : {product : this.productSlug , gotoBackground : 'select-background'}}" type="button" class="btn btn-submit w-75" v-else >入力内容を確認する</router-link>

                </div>
            </div>
            <div class="mt-5">
                <footer-component/>
            </div>
    </div>
</template>
<script>
import headerComponent from '../headerComponent'
import footerComponent from '../footerComponent'
import {callApi} from '../../api/apiHelper'
import { mapGetters } from 'vuex'
import * as helps from '../../Helper'
export default {
    name : 'selectSize', 
    mounted() {
        this.getSizeProduct()
    },

    components : {
        'header-component' : headerComponent,
        'footer-component' : footerComponent
    },
    computed: {
        ...mapGetters({
            getAuthToken: 'auth/getAuthToken'
        })
    },
    methods : {
        checkChecked() {
            this.is_checked = true
        },
        back() {
            localStorage.removeItem('contact')
            window.history.back()
        },
        getSizeProduct(id) {
            callApi(this.getAuthToken).get('/get-size-product/'+this.productSlug).then((response) => {
                console.log(response);
                this.sizes = response.data;
            }, (error) => {
                console.log(error);
            })
        },
        formatterNumber(number){
            return helps.number_format(number)
        },
        submit(){
            if(this.is_checked){
                this.$router.push({name : 'selectBackground' , params : {product : this.productSlug , gotoBackground : 'select-background'}})
            }
            else {
                this.error = "ban nen chon 1 size"
            }
        }
    },
    data() {    
        return {
            is_checked : false,
            productSlug : this.$router.currentRoute.params.product,
            sizes : null,
            error : null,
            gotoBackground : null,
        }
    }

}
</script>
<style scoped>
.button-group-float{
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    bottom: 0px;
    left: 0px;
    width: 100%;
    background-color: #E4EEFD;
    padding: 10px 8px;
    
}
.btn-back, .btn-back:hover{
    background-color: #999999;
    color: #ffff;
    margin-right: 10px;
}
.btn-submit, .btn-submit:hover{
    background-color: #DF6463;
    color: #ffff;
    max-width: 300px;
}
.btn-submit.disable, .btn-submit.disable:hover{
    background-color: #E8D1DF;
}
</style>