<template>
<div>
    <select-size/>
</div>
</template>
<script>

import selectSize from '../../components/product/selectSize'
export default {
    name : 'selectSize',
    mounted() {
        console.log('loaded');
    },
    components : {
        'select-size' : selectSize
    },
    data() {
        return {
            producSlug : this.$router.currentRoute.params.product,
            
        }
    }
    
}
</script>