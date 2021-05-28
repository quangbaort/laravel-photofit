<template>
    <div class="container-fuild pb-57">
        <headerComponent/>
        <div class="about w-100 my-2 container">
            <img :src="image" class="d-block  img-fluid" alt="">
        </div>
        <backComponent/>
        <footerComponent/>
    </div>
</template>
<script>
import headerComponent from '../components/headerComponent'
import image from '../../images/レイアウターって.png'
import backComponent from '../components/BackComponent'
import footerComponent from '../components/footerComponent'
export default {
    name : 'layouter',
    components : {
        headerComponent,
        backComponent,
        footerComponent
    },
    data() {
        return {
            image : image
        }
    }
}
</script>