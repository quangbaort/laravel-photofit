<template>
    
    <div class="button-group-float">
        <button class="btn btn-back w-xs-100" @click="back">戻る</button>
    </div>
</template>
<script>
export default {
    name : 'backComponent',
    methods : {
        back() {
            window.history.back()
        }
    }
}
</script>
<style scoped>

.button-group-float{
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    margin-top : 30px;
    z-index : 0;
    bottom: 0px;
    left: 0px;
    width: 100%;
    background-color: #E4EEFD;
    padding: 10px 8px;
    
}
.btn-back, .btn-back:hover{
    background-color: #999999;
    color: #ffff;
}

</style>