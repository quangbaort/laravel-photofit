<template>
    <div class="pb-57">
        <headerComponent/>
        <div class="about w-100 container"  style="margin-top: 5rem">
            <img :src="image" class="d-block w-100" alt="">
        </div>
        <backComponent/>
        <footerComponent/>
    </div>
</template>

<script>
import headerComponent from '../components/headerComponent.vue'
import image from '../../images/01-2-1PhotoFit_フォトフィットって.png'
import backComponent from '../components/BackComponent'
import footerComponent from '../components/footerComponent'
export default {
  components: { headerComponent , backComponent ,footerComponent },
    name : "about",

    data() {
        return {
            image : image
        }
    }
    
}
</script>
