<template>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" :src="slide.slide1" alt="First slide">
                    
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" :src="slide.slide2" alt="Second slide">
                    
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" :src="slide.slide3"  alt="Third slide">
                    
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
         
    </div>
</template>
<script>
    import slide1 from '../../images/仮トップカルーセル1.png'
    import slide2 from  '../../images/仮トップカルーセル2.png'
    import slide3 from  '../../images/仮トップカルーセル3.png'

    export default {
    name : "sliderComponent",
    data(){
        return {
            slide : {
                slide1 : slide1,
                slide2 : slide2,
                slide3 : slide3
            }
        }
    }
}
</script>
<style scoped>
.carousel-indicators{
    bottom : -56px;
}

.carousel-indicators li{
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: #ccc;
}
.carousel-caption{
    bottom : -150px;
    position: absolute ;

}
.carousel-caption h5 ,.carousel-caption p {
    color : #000;
    /* padding : 20px 0; */
}

a{
    text-decoration: revert !important;
}
img.d-block.w-100 {
    border-radius: 15px ;
}
@media only screen and (min-width: 600px) {
    img.d-block.w-100 {
        height: 450px;
    }
}
@media only screen and (max-width: 992px) {
    
    p{
    font-size: 13px;
    }
}
.carousel-item {
    width: 100%;
}
</style>
