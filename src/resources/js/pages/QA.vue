<template>
    <div class="pb-57">
        <div  style="margin-top: 5rem">
            <headerComponent/>
            <h3 class="text-center my-2 font-weight-bold">よくある質問</h3>
            <div class="container">
                <div class="row justify-content-cenetr">
                    <a v-bind:href="'#'+qa.id" style="text-decoration: revert"  class="d-block col-md-4 col-sm-6 col-6" v-for="qa in Qas" :key="qa.id">
                        {{ qa.name }}
                    </a>
                </div>
            </div>
            <div class="QA my-2 slide container" v-for="qa in Qas" :key="qa.id">
                <a href="javascript:void" v-bind:id="qa.id" class="text-center d-block" >{{qa.name}}</a>
                <hr class="text-primary my-0 mb-2" style="width:20%;border:2px solid #3490dc;">
                <div class="show"  v-for="q in qa.qa" :key="q.id" >
                    <div class="slide">
                        <div v-if="qa.id === q.qa_group_id">
                            <div id="vn-click" @click="show(q.id)"  style="background : #b2cef6;border:2px solid #3490dc;" class="p-2 vn-click">
                                <i class="fa fa-arrow-circle-right" v-bind:id="'icon'+q.id"></i>
                                {{q.question}}
                            </div>
                            <div v-bind:id="'vnInfo'+q.id" class="p-2 vn-info" style="display:none;">
                                {{q.answer}}
                            </div>
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
    name : "QA",
    mounted() {
        this.getQa()
        this.show()
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
            callApi('').get('/get-qa').then((response) => {
                console.log(response);
                this.Qas = response.data;
                this.show()

            }, (error) => {
                console.log(error);
            })
        },
        scrollDiv (name) {
            var position = $("#"+name).offset().top - 200;
            $("HTML, BODY").animate({
                scrollTop: position
            }, 1000);
        },

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