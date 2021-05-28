<template>
    <div v-if="!is_completed" class="pb-57">
        <headerComponent/>
        <div class="container my-3 pt-4">
            <h3 class="text-center">お問い合わせ内容の確認</h3>
            <p class="description text-center">入力内容に間違えがないかご確認ください。</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="card col-md-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">お問い合わせの種類</div>
                    </div>
                    <div class="card-body">
                        {{contact.type}}
                    </div>
                </div>
                <div class="card col-md-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">お問い合わせの内容</div>
                    </div>
                    <div class="card-body">{{contact.content}}</div>
                </div>
                <div class="card col-md-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">お名前</div>
                    </div>
                    <div class="card-body">{{contact.firstName}}{{contact.lastName}}</div>
                </div>
                <div class="card col-md-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">ふりがな</div>
                    </div>
                    <div class="card-body">{{contact.firstNameKana}}{{contact.lastNameKana}}</div>
                </div>
                <div class="card col-md-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">メールアドレス</div>
                    </div>
                    <div class="card-body">{{contact.email}}</div>
                </div>
            </div>
        </div>
        <div class="button-group-float">
            <button class="btn btn-back" @click="back">修正する</button>
            <button class="btn btn-submit" @click="submit">この内容で送信する</button>
        </div>
        <footerComponent />
    </div>
    <div v-else>
        <headerComponent/>
        <div class="container pt-4">
            <div class="text-center" style="padding: 100px 0px">
                <p>お問い合わせありがとうございます。</p>
                <p>ご返信にお日にちをいただく場合がございます。<br/>ご了承ください。</p>
                <button class="btn btn-submit" @click="confirm">トップへ戻る</button>
            </div>
        </div>
        <footerComponent />
    </div>
</template>
<script>
import footerComponent from '../components/footerComponent'
import headerComponent from '../components/headerComponent'
import contacApi from '../api/contact'
export default {
    name : "privacy-component",
    components : {
        headerComponent,
        footerComponent
    },
    created() {
        this.$store.commit('TOGGLE_SUB_MENU', false)
        let contact = JSON.parse(localStorage.getItem('contact'))
        this.contact = {
            type: contact.type,
            content: contact.content,
            lastName: contact.lastName,
            firstName: contact.firstName,
            lastNameKana: contact.lastNameKana,
            firstNameKana: contact.firstNameKana,
            email: contact.email
        }
    },
    data (){
        return {
            contact:{
                type: '--',
                content: '',
                lastName: '',
                firstName: '',
                lastNameKana: '',
                firstNameKana: '',
                email: ''
            },
            is_completed: false
        }
    },
    methods: {
        back(){
            this.$router.push({ name: "contact" })
        },
        submit(){
            contacApi.sendContact('', this.contact).then((res) => {
                this.is_completed = true
                localStorage.removeItem('contact')
            }).catch(error => {
                console.log(error)
            })
        },
        confirm(){
            this.$router.push({ name: "top" })
        }
    }
}
</script>


<style scoped>
.no-padding{
    padding-left: 0px;
    padding-right: 0px;
}
.nav-link{
    color: #9AB4DB;
    text-decoration: underline;
}
.nav-link:hover{
    color: #9AB4DB;
    text-decoration: underline;
}
.description{
    font-weight: 500;
}
.card {
    border-radius: unset;
}
.card-header{
    background: #DCE8F9 ;
    padding: 0.5rem 0.5rem;
    justify-content: space-between;
    align-items: center;
    display: flex;
    border-radius: unset !important;
    border: none;
}
.card-title{
    font-weight: 500;
    margin: 0px
}
.card-body{
    padding: 0.5rem;
}
.required{
    padding: 1px 7px;
    background-color: #DF6463;
    color: #fff;
    font-size: 13px;
}
.select-box{
    width: unset !important;
}
.note{
    color: #A5999C;
    font-size: 10px;
}
.note > a, a:hover{
    color: #57D874;
    text-decoration: underline;
}
input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #c4c4c6;
  opacity: 1; /* Firefox */
}

input:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #c4c4c6;
}

input::-ms-input-placeholder { /* Microsoft Edge */
  color: #c4c4c6;
}
.button-group-float{
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    bottom: 0px;
    left: 0px;
    width: 100%;
    background-color: #E4EEFD;
    padding: 10px 8px;

}
.btn-back, .btn-back:hover{
    background-color: #999999;
    color: #ffff;
    margin-right: 10px;
}
.btn-submit, .btn-submit:hover{
    background-color: #DF6463;
    color: #ffff;
    max-width: 300px;
    width: 70%
}
</style>
