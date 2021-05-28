<template>
    <div>
        <header-component/>
            <div class="container mt-5">
                <h2 class="text-center py-5">背景を選んでください</h2>
                <p class="text-center text-danger font-weigth-bold">{{error}}</p>
                <div id="background" class="mb-5">
                    <div class="border-bottom my-4" v-for="background in backgrounds" :key="background.id">
                        <div class='py-3 row justify-content-between align-items-center'>
                            <div class="col-1">
                                <input type="radio" @click="checkChecked()"  name="size" class="m-2 d-inline-block"/>
                            </div>
                            <div class="col-3">
                                <p>{{ background.name }} ¥ </p>
                            </div>
                            <div class="col-3">
                                <img :src="public_path+background.background_url" class=" w-100 img-fuild d-block" alt="">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary"  data-toggle="modal" v-bind:data-target="'#review'+background.id" >
                                    [ プレビュー
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" v-bind:id="'review'+background.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header p-3" style="display : contents">
                                        <div class="p-3">
                                            <button type="button"  class="close" data-dismiss="modal" aria-label="Close" >
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">背景プレビュー</h5>
                                    </div>
                                    <div class="modal-body">
                                            <div id="review" class="carousel slide h-100" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#review" data-slide-to="0" class="active"></li>
                                                <li data-target="#review" data-slide-to="1"></li>
                                                <li data-target="#review" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="carousel-item" v-for="(backgroundsReview , index) in background.background_review" :key="backgroundsReview.id" v-bind:class="{'active' : index == 0}">
                                                    <img class="d-block w-100" :src="public_path+backgroundsReview.background_url" alt="First slide">
                                                </div>
                                                
                                            </div>
                                            <a class="carousel-control-prev" href="#review" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#review" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-group-float">
                    <button class="btn btn-back" @click="back">戻る</button>
                    <button type="button" class="btn btn-submit w-75 " @click="submit()" v-bind:class="{ 'disable' : !is_checked }" >次へ</button>
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
export default {
    name : 'selectBackground', 
    mounted() {
        this.getBackground()
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
        getBackground(id) {
            callApi(this.getAuthToken).get('/get-background-product/'+this.product).then((response) => {
                console.log(response);
                this.backgrounds = response.data;
            }, (error) => {
                console.log(error);
            })
        },
        submit(){
            if(this.is_checked){
                this.$router.push({name : 'selectBackground' , params : {product : this.product}})
            }
            else {
                this.error = "ban nen chon 1 background"
            }
        }
    },
    data() {
        return {
            is_checked : false,
            product : this.$router.currentRoute.params.product,
            backgrounds : null,
            error : null,
            public_path : process.env.MIX_SENTRY_DSN_PUBLIC,
            backgroundsReview : null
        }
    }

}
</script>
<style scoped>
.carousel-indicators{
    bottom : -30px;
    
}

.text {
color : #000 !important;
}
.carousel-indicators li{
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: #ccc;
}
.carousel-item {
    width: 100%;
}




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