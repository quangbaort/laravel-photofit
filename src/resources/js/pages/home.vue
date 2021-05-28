<template>

    <div class="container-fluid">
        <headerComponent/>
        <div class="pt-4">
            <subMenuComponent :products="products"/>
        </div>
        <sliderComponent/>
        <div class="text-center my-5">
            <p>PhotoFitは、PhotoSpotで購入されたお写真と</p>
            <p>ご自身のお写真を使って</p>
            <p>オリジナル商品がつくれるサイトです</p>
            <a href="#news">お知らせはこちら</a>
            <h2 class="text-center my-2"><a href="javascript:void">Our Pics</a></h2>
        </div>
        <div class="container">
            <div v-bind:id="product.category_name" v-for="(product) in products" :key="product.id">
                <div class="card my-2 "   data-aos="fade-up" data-aos-offset="50">
                <div >
                    <div class="card-header" >
                    <h5 class="card-title" >
                    <img :src="image.item1" style="width:20px;" alt="" v-if="product.category_name === '写真集'">
                    <img :src="image.item2" style="width:20px;" alt="" v-if="product.category_name === 'フォトパネル'">
                    <img :src="image.item3" style="width:20px;" alt="" v-if="product.category_name === 'フォトアイテム'">
                    <img :src="image.item4" style="width:20px;" alt="" v-if="product.category_name === 'フォトグッズ'">
                    {{product.category_name}}
                    </h5>
                </div>
                <div class="card-body row" >
                    <div v-for="p in product.product" :key="p.id" class="col-md-6">
                        <div v-if="product.id === p.product_category_id" >
                        <router-link :to="{name : 'product' , params : {product : p.slug}}">
                            <img :src="public_path+p.thumbnail" alt="" data-aos="fade-up" data-aos-offset="50" class="img-fluid">
                            <h4 class="text-center my-2">{{ p.name }} ¥<span class="text-danger">{{formatterNumber(p.price_estimate)}}~</span></h4>
                            <p class="text-center">{{p.description}}</p>
                        </router-link>
                            
                        </div>
                    </div>
                </div>
                </div>

            </div>
            </div>

        </div>
        <h3 class="text-center"><a id="news" href="javascript:void" style="text-decoration: revert">News</a></h3>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center"  v-for="New in newLimit" :key="New.id" >
                <a href="" class="text-muted" data-toggle="modal" style="text-decoration: revert" v-bind:data-target="'#modal'+New.id">{{New.title}}</a>
                <div class="modal fade " v-bind:id="'modal'+New.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="display : block">
                                <div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <h3 class="modal-title">{{New.title}}</h3>
                                <h3>{{formartDate(New.created_at)}}</h3>
                            </div>
                            <div class="modal-body">
                                {{New.content}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="display : block">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        <h5 class="text-center" id="exampleModalLabel2"><a href="" style="text-decoration: revert">News</a> </h5>
                    </div>
                    <div class="modal-body">
                        <div class=""  v-for="News in news" :key="News.id" >
                            <a href="" class="text-muted" style="text-decoration: revert" @click.prevent="openModal(News.id)" v-bind:data-target="'#modal1'+News.id">{{News.title}}</a>
                            <div class="modal fade text-center" v-bind:id="'modal1'+News.id"  role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="display : block">
                                            <div>
                                                <button type="button" class="close" @click="closeModal(News.id)" >
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <h3 class="modal-title">{{News.title}}</h3>
                                            <h3>{{formartDate(News.created_at)}}</h3>
                                        </div>
                                        <div class="modal-body">
                                            {{News.content}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center my-2">
            <button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#exampleModal">
            お知らせ一覧
            </button>
        </div>
        <footerComponent/>
    </div>
</template>

<script>

import headerComponent from '../components/headerComponent'
import sliderComponent from "../components/sliderComponent"
//import P1 from '../../images/オリジナル写真集.png'
import footerComponent from '../components/footerComponent'
import item1 from '../../images/写真集アイコン.png'
import item2 from '../../images/フォトパネルアイコン.png'
import item3 from '../../images/フォトグッズアイコン.png'
import item4 from '../../images/フォトアイテムアイコン.png'
import {callApi} from '../api/apiHelper'
import subMenuComponent from '../components/subMenuComponent'
import * as helps from '../Helper'
export default {
    components: { headerComponent , sliderComponent , footerComponent , subMenuComponent},
    name : "home",
    mounted() {
        this.getProduct();
        this.getNews();
        console.log(process.env.MIX_SENTRY_DSN_PUBLIC)

    },
    methods : {
        getProduct() {
            callApi('').get('/get-product').then((response) => {
                console.log(response);
                this.products = response.data;
            }, (error) => {
                console.log(error);
            })
        },
        formartDate(created_at){
            return helps.formatterDate.format(Date.parse(created_at))
        },
        formatterNumber(number){
            return helps.number_format(number)
        },
        getNews() {
            callApi('').get('/get-news').then((response) => {
                console.log(response);
                this.newLimit = response.data.newLimit.data;
                this.news = response.data.news
            }, (error) => {
                console.log(error);
            })
        },
        closeModal(id) {
            $('#modal1'+id).css('display' , 'none')
            $('#modal1'+id).removeClass('show')
            $('.modal-backdrop').last().remove()
            $('body').removeClass('modal-open')
        },
        openModal(id){
            $('#modal1'+id).css('display' , 'block')
            $('#modal1'+id).addClass('show')
            $('body').append('<div class="modal-backdrop fade show"></div>')
            $('body').addClass('modal-open')
        }
    },
    data() {
        return {
            //p1 : P1,
            products : null,
            news : null,
            title_new : null ,
            content_new : null ,
            newLimit : null ,
            image : {
                item1 : item1,
                item2 : item2,
                item3 : item3 ,
                item4 : item4 ,
            },
            public_path : process.env.MIX_SENTRY_DSN_PUBLIC
        }
    }
}
</script>
<style scoped>
.card-header {
    background : #a2c4f6;
}
.card-title {
margin : 0 0
}
h5 , h4{
color : #11205f;
font-weight: 600;
}
@media only screen and (max-width: 992px) {
    
    p{
    font-size: 13px;
    }
}


</style>