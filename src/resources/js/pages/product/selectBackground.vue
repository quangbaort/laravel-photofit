<template>
<div>
    <select-background/>
</div>
</template>
<script>

import selectBackground from '../../components/product/selectBackground'
export default {
    name : 'selectBackground',
    mounted() {
        console.log('loaded');
    },
    components : {
        'select-background' : selectBackground
    },
    data() {
        return {
            producSlug : this.$router.currentRoute.params.product,
            
        }
    }
    
}
</script>