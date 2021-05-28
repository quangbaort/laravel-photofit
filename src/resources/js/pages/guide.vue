<template>
    <div class="pb-57">
        <div  style="margin-top: 5rem">
            <headerComponent/>
            <h3 class="text-center my-2 font-weight-bold">ご利用ガイド</h3>
            <div class="QA my-2 slide container" v-for="qa in Qas" :key="qa.id">
                <div class="show" >
                    <div class="slide" @click="show(qa.id)">
                        <div id="vn-click"  style="background : #b2cef6;border:2px solid #3490dc;" class="p-2 vn-click">
                            <i class="fa fa-arrow-circle-right" v-bind:id="'icon'+qa.id"></i>
                            {{qa.title}}
                        </div>
                        <div v-bind:id="'vnInfo'+qa.id"  class="p-2 vn-info" style="display:none;">
                            {{qa.content}}
                        </div>
                    </div>
                </div>
            </div>
            <backComponent/>
        </div>
        <footerComponent/>
    </div>
</template>
<script>
import headerComponent from '../components/headerComponent'
import backComponent from '../components/BackComponent'
import footerComponent from '../components/footerComponent'
import {callApi} from '../api/apiHelper'
export default {
    name : "guide",
    mounted() {
        this.getQa()
    },
    components: {
        headerComponent,
        backComponent,
        footerComponent
    },
    methods : {
        show(id) {
            $('#vnInfo'+id).slideToggle(300)
            if($('#icon'+id).hasClass('fa fa-arrow-circle-down')) {
                $('#icon'+id).attr('class' , 'fa fa-arrow-circle-right')
            }
            else if($('#icon'+id).hasClass('fa fa-arrow-circle-right'))  {
                $('#icon'+id).attr('class' , 'fa fa-arrow-circle-down')
            }
        },
        getQa() {
            callApi('').get('/get-guide').then((response) => {
                console.log(response);
                this.Qas = response.data;
                this.show()

            }, (error) => {
                console.log(error);
            })
        }
    },
    data() {
        return {
            toggleCheck: false,
            Qas : null,
        }
    }
}
</script>
<style scoped>
.vn-click{
    cursor: pointer;
}
</style>