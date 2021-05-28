<template>
<div>
    <photoAlbum v-if="producSlug === 'photo-album'"/>
    <h1 v-else>Doing</h1>
</div>
</template>
<script>
import photoAlbum from '../../components/product/photoAlbum'

export default {
    name : 'product', 
    components : {
        photoAlbum
    },
  
    data() {
        return {
            producSlug : this.$router.currentRoute.params.product,
        }
    }

}
</script>
