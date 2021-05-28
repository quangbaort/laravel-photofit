<template>
    <div class="pb-57">
        <headerComponent/>
        <div class="container text-center mt-5 pt-4">
            <div class="title">使用できない写真一覧</div>
            <div class="description">学校・団体様のご要望により</div>
            <div class="description">こちらのお写真はご使用になれません</div>
        </div>
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 col-6" v-for="image in images" :key="image.photo_id">
                    <div class="">
                        <img :src="image.data"  alt="" class="img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
        <backComponent/>
        <footerComponent/>
    </div>
</template>

<script>
import headerComponent from '../components/headerComponent'
import { mapGetters } from 'vuex'
import footerComponent from '../components/footerComponent'
import backComponent from '../components/BackComponent'
import photoApi from '../api/photo'
export default {
    name: 'image-unused',
    
    components: {
        headerComponent,
        backComponent,
        footerComponent
    },
    computed: {
        ...mapGetters({
            getAuthToken: 'auth/getAuthToken'
        })
    },
    data(){
        return {
            images: []
        }
    },
    created(){
        photoApi.getListPhotoUnused(this.getAuthToken).then(rs=>{
            console.log(rs)
            this.images = rs.data
            console.log(this.images )
        })
    }
}
</script>

<style scoped>
.title{
    color: #5ba5e2;
    font-weight: 500;
}
.description{
    font-weight: 500;
}
.img-thumbnail {
    padding: 0.25rem;
    max-width: 100%;
    height: auto;
    background-color: none;
    border: unset;
    border-radius: 0;
}
</style>