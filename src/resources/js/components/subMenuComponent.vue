<template >
    <div class=" text-center" style="z-index : 100"  id="submenu" v-if="this.$router.currentRoute.path == '/top' || this.$router.currentRoute.path == '/'">
        <ul class="nav justify-content-center">
            <li class="nav-item justify-content-center" v-for="product in products" :key="product.id">
                <a class="nav-link active font-weight-bold"  @click="scrollDiv(product.category_name)">
                    <img :src="item.item1"  alt="" v-if="product.category_name === '写真集'">
                    <img :src="item.item2"  alt="" v-if="product.category_name === 'フォトパネル'">
                    <img :src="item.item3"  alt="" v-if="product.category_name === 'フォトグッズ'">
                    <img :src="item.item4"  alt="" v-if="product.category_name === 'フォトアイテム'">
                    <p class="my-1">{{product.category_name}}</p>
                </a>
            </li>
        </ul>
    </div>
</template>
<script>
import item1 from '../../images/写真集アイコン.png'
import item2 from '../../images/フォトパネルアイコン.png'
import item3 from '../../images/フォトグッズアイコン.png'
import item4 from '../../images/フォトアイテムアイコン.png'
export default {
    name : 'submenu',
    props: ['products'],
    created() {

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                $('#submenu').addClass('fixed-top')
                $('#submenu').css('background' , '#f8fafc')
            }
            else {
                $('#submenu').css('margin-top' , this.submenu)
                $('#submenu').removeClass('fixed-top')
                $('#submenu').css('background' , 'none')

            }
        });
    },
    data() {
        return {
            item : {
                item1 : item1,
                item2 : item2,
                item3 : item3 ,
                item4 : item4 ,
            },
            num : 0,
         
        }
    }
}
</script>

<style scoped>

.nav-item {
    text-align : center;

}
.nav {
    flex-wrap: nowrap;
    height : 100%;

}
.nav-item .nav-link {
    text-align: center;
}
img {
display: block;
height: 50px;
margin : auto;
}
#submenu{
        padding-top : 20px;
    }
@media (min-width: 992px){
    #submenu{
        margin-top : 4%;
        
    }
    #submenu{
        padding-top : 10px;
    }
}
@media (max-width : 992px){
    #submenu{
        margin-top : 15%;
    }
    img {
        display: block;

    }
    p{
        font-size: 13px;
    }
}
a {
    cursor: pointer;
}
@media (max-width : 992px){
#submenu{
        margin-top : 10%;
    }
.nav-link {
    padding: 0.5rem 0;
    }
ul.nav {
    justify-content: space-around !important;
}
}

@media (max-width : 520px){
#submenu{
        margin-top : 15%;
    }
}
@media (max-width : 442px){
#submenu{
        margin-top : 12%;
    }
}
@media (max-width : 390px){
#submenu{
        margin-top : 16%;
    }
}
@media (max-width : 805px){
#submenu{
        margin-top : 9%;
    }
}
@media (min-width : 806px){
#submenu{
        margin-top : 7%;
    }
}
@media (min-width : 1058px){
#submenu{
        margin-top : 6%;
    }
}
@media (min-width : 1029px){
#submenu{
        margin-top : 5%;
        padding-top : 10px;
    }
    
}
@media (min-width : 1450px){
#submenu{
        margin-top : 4%;
    }
}
@media (min-width : 1813px){
#submenu{
        margin-top : 3%;
    }
}
@media (max-width : 475px){
#submenu{
        margin-top : 15%;
    }
}
</style>