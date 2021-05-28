<template>
    <footer class="">
        <div class="footer__top">
            <div class="row justify-content-center py-2">
                <div class="">
                    <h6 class="text-center"><a href="/top"><img :src="logoLight" alt=""></a></h6>
                    <p>TEL : 072 866 1106 () Id : 08~18 :00</p>
                    <p>FAX : 072 450 6336</p>
                    <p>EMAIL : request@photospit.jp</p>
                </div>
            </div>

            <div class="footer__bottom">
                <div class="row justify-content-center py-2 align-items-center ">
                <div class="mx-1 ">
                    <h6><a href="https://www.daicolo.co.jp/"><img :src="logo_cicrle" alt="" class='img-fluid'></a></h6>
                </div>
                    <div class="align-items-center">
                        <h6><a href="https://www.daicolo.co.jp/"><img :src="photofitText"  class='img-fluid' alt=""></a></h6>
                        <h6><a href="https://www.daicolo.co.jp/"><img :src="logoDailoco"  class='img-fluid' alt=""></a></h6>
                        <h4>©2020DAICOLO CO.,LTD.</h4>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
import logo from '../../images/logo.png'
import logoDailoco from '../../images/daicolo_logo.png'
import logoLight from '../../images/logo-light.png'
import logo_cicrle from '../../images/logo_cicrle.png'
import photofitText from '../../images/photofit_text.png'

export default {
    name : 'footerComponent',
    data() {
        return {
            logo : logo,
            logoDailoco : logoDailoco,
            logoLight : logoLight,
            logo_cicrle : logo_cicrle ,
            photofitText : photofitText
        }
    }

}
</script>
<style scoped>
footer {
    z-index: 100;
}
    .footer__top{
        background : #799cce;
    }
    .footer__bottom {
        background : #d6e0f0;
    }
    p {
        color : #fff;
        font-weight: 600;
    }

</style>
