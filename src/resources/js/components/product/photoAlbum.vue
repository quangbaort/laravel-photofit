<template>
    <div>
        <headerComponent/>
        <div class="" style="margin : 5rem 0 3rem 0">
            <sliderComponent/>
        </div>
        <div class="container my-4 text-center">
            <h4 class="text-center my-2">{{ product.name }} ¥<span class="text-danger">{{product.price_estimate}}~</span></h4>
            <p class="text-center">{{product.description}}</p>
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalCenter">review example</button>
        </div>
        <hr class="text-primary my-4" style="border-top:2px solid #3490dc;">
        <div class="container">
            <div class="product row">
                <div class="col-md-6" v-for="image in product.product_image" :key="image.id">
                    <img class="d-block w-100" :src="public_path+image.image_url" alt="First slide">
                    <div class="text-center my-2">
                        <p>{{image.description}}</p>
                    </div>
                </div>
            </div>
            <div class="my-2 ">
                <h2 class="text-center"> <a href="javascript:void">Lorem ipsum dolor sit amet.</a> </h2>
                <p class="text-center"> <a href="javascript:void">Lorem ipsum dolor sit amet.</a> </p>
                <table class=" w-75 mx-auto table table-bordered">
                    <thead>
                        <tr>
                            <th class="" style="width  : 15%" scope="col">#</th>
                            <th class="bg-light"   scope="col">First</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="width  : 15%" scope="row">1</th>
                            <td>Mark</td>
                            
                        </tr>
                        <tr>
                            <th style="width  : 15%" scope="row">2</th>
                            <td>Jacob</td>
                            
                        </tr>
                        <tr>
                            <th style="width  : 15%" scope="row">2</th>
                            <td>Jacob</td>
                            
                        </tr>
                        <tr>
                            <th style="width  : 15%" scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="button-group-float">
            <button class="btn btn-back" @click="back">戻る</button>
            <router-link :to="{name : 'selectSize' , params : {product : this.producSlug ,gotoSize : 'select-size'} }" class="btn btn-submit w-75" >入力内容を確認する</router-link>
        </div>
        <footerComponent/>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header p-3" style="display : contents">
                        <div class="p-3">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Modal title</h5>
                        <h5 class="modal-title  text-center" id="">Modal title</h5>
                    </div>
                    <div class="modal-body">
                            <div id="review" class="carousel slide h-100" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#review" data-slide-to="0" class="active"></li>
                                <li data-target="#review" data-slide-to="1"></li>
                                <li data-target="#review" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item" v-for="(image , index) in product.product_image" :key="image.id" v-bind:class="{'active' : index == 0}">
                                    <img class="d-block w-100" :src="public_path+image.image_url" alt="First slide">
                                    <div class="carousel-caption text">
                                        <h5>Lorem ipsum dolor sit amet.</h5>
                                        <p>Lorem ipsum dolor sit amet.</p>
                                    </div>
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
</template>
<script>


import headerComponent from '../headerComponent'
import sliderComponent from "../sliderComponent"
import footerComponent from '../footerComponent'
import {callApi} from '../../api/apiHelper'
import * as helps from '../../Helper'
export default {
    name : 'photoAlbum', 
    mounted() {
        this.getProduct()
    },
    components : {
        headerComponent , footerComponent ,sliderComponent
    },
    methods : {
        getProduct() {
            callApi('').get('/get-product-name/'+this.producSlug).then((response) => {
                this.product = response.data;
            }, (error) => {
                console.log(error);
            })
        },
        back() {
            window.history.back()
        },
    },
    data() {
        return {
            product : null,
            producSlug : this.$router.currentRoute.params.product,
            images : null ,
            is_checked: true,
            public_path : process.env.MIX_SENTRY_DSN_PUBLIC
        }
    }

}
</script>
<style scoped>
.carousel-indicators{
    bottom : -20px;
    
}
.carousel-caption{
    bottom : -70px;
    position: initial ;
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
.carousel-control-prev, .carousel-control-next {
bottom : 120px;
}
.modal-body{
height : 450px;
}
#reivew {
    height : 100%;
}
@media (max-width: 992px){
        img {   margin: auto;}

}
@media (min-width: 992px){
    img {height : 400px ;  margin: auto;}
}
th {
    background : rgb(145, 143, 143);
    
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
.carousel-item img { height : 300px}
</style>