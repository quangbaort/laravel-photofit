<template>
    <div class="pb-57">
        <headerComponent/>
        <div class="container my-5 pt-4">
            <h3 class="text-center py-3">メールでのお問い合わせ</h3>
            <router-link class="nav-link text-center" to="/question-and-answer">よくある質問</router-link>
            <p class="description">※お返事にお日にちをいただく場合がございます。お急ぎの場合はお電話ください。</p>
            
        </div>
        <div class="container">
            <div class="row">
                <div class="card col-md-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">お問い合わせの種類</div>
                        <span class="required">必須</span>
                    </div>
                    <div class="card-body">
                        <span class="error" v-if="this.errors.type">{{this.errors.type}}</span>
                        <select v-model="contact.type" name="" id="" class="form-control select-box" >
                            <option value="--">--</option>
                            <option value="登録について">登録について</option>
                            <option value="ログインについて">ログインについて</option>
                            <option value="お買い物について">お買い物について</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>																						
                </div>
                <div class="card col-md-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">お問い合わせの内容</div>
                        <span class="required">必須</span>
                    </div>
                    <div class="card-body">
                        <span class="error" v-if="this.errors.content">{{this.errors.content}}</span>
                        <textarea  v-model="contact.content" class="form-control" id="" cols="30" rows="7"></textarea>
                    </div>
                </div>
                <div class="card col-md-6 col-sm-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">名前(姓)</div>
                        <span class="required">必須</span>
                    </div>
                    <div class="card-body">
                        <span class="error" v-if="this.errors.lastName">{{this.errors.lastName}}</span>
                        <input v-model="contact.lastName" type="text" class="form-control" placeholder="ダイコロ">
                    </div>
                </div>
                <div class="card col-md-6 col-sm-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">名前(名)</div>
                        <span class="required">必須</span>
                    </div>
                    <div class="card-body">
                        <span class="error" v-if="this.errors.firstName">{{this.errors.firstName}}</span>
                        <input v-model="contact.firstName" type="text" class="form-control" placeholder="花子">
                    </div>
                </div>
                <div class="card col-md-6 col-sm-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">ふりがな(せい)</div>
                        <span class="required">必須</span>
                    </div>
                    <div class="card-body">
                        <span class="error" v-if="this.errors.lastNameKana">{{this.errors.lastNameKana}}</span>
                        <input  v-model="contact.lastNameKana" type="text" class="form-control" placeholder="だいころ">
                        <span class="note">※ひらがなで入力して下さい。</span>
                    </div>
                </div>
                <div class="card col-md-6 col-sm-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">ふりがな(めい)</div>
                        <span class="required">必須</span>
                    </div>
                    <div class="card-body">
                        <span class="error" v-if="this.errors.firstNameKana">{{this.errors.firstNameKana}}</span>
                        <input v-model="contact.firstNameKana" type="text" class="form-control" placeholder="はなこ">
                        <span class="note">※ひらがなで入力して下さい。</span>
                    </div>
                </div>
                <div class="card col-md-6 col-sm-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">メールアドレス</div>
                        <span class="required">必須</span>
                    </div>
                    <div class="card-body">
                        <span class="error" v-if="this.errors.email">{{this.errors.email}}</span>
                        <input v-model="contact.email" type="email" class="form-control" placeholder="hanoko@example.com">
                        <span class="note">※携帯メールアドレスをご登録頂く場合、chuckle_form@omoidenet.jpからのドメ
                                イン着信許可を設定して下さい。詳しくは<a href="#" target="_blank">こちら</a>をご参照ください。</span>
                    </div>
                </div>
                <div class="card col-md-6 col-sm-12 no-padding">
                    <div class="card-header">
                        <div class="card-title">メールアドレス(再入力)</div>
                        <span class="required">必須</span>
                    </div>
                    <div class="card-body">
                        <span class="error" v-if="this.errors.emailConfirm">{{this.errors.emailConfirm}}</span>
                        <input v-model="contact.emailConfirm" type="email" class="form-control" placeholder="">
                        <span class="note">※誤入力防止のため再入力してください。</span>
                    </div>
                </div>
                <div class="card col-md-12 col-sm-12 no-padding" id="policy">
                    <privacy-component />
                    <div class="text-center">
                        <div>
                            <v-icon name="caret-down" scale="2" style="color: #88CBEB"></v-icon>
                        </div>
                        <div>
                            <div class="checkbox-privacy">
                                <input v-model="contact.is_checked" type="checkbox" id="checkbox" class="">
                                <label for="checkbox">お客様情報の取り扱いに同意する</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-group-float">
            <button class="btn btn-back" @click="back">戻る</button>
            <button class="btn btn-submit w-75" :class="{ 'disable': !contact.is_checked }" @click="submit">入力内容を確認する</button>
        </div>
        <footerComponent/>
    </div>
</template>
<script>
import headerComponent from '../components/headerComponent'
import PrivacyComponent from '../components/privaryComponent'
import { mapGetters } from 'vuex'
import footerComponent from '../components/footerComponent'
export default {
    name : 'contact',
    created() {
        this.$store.commit('TOGGLE_SUB_MENU', false)
        if(this.isAuthenticated){
            this.contact.email = this.getCurrentUser.email
            this.contact.emailConfirm = this.getCurrentUser.email
            this.contact.lastName = this.getCurrentUser.last_name
            this.contact.firstName = this.getCurrentUser.first_name
            this.contact.lastNameKana = this.getCurrentUser.last_name_furigana
            this.contact.firstNameKana = this.getCurrentUser.first_name_furigana
        }

        this.$store.commit('TOGGLE_SUB_MENU', false)
        let contact = JSON.parse(localStorage.getItem('contact'))
        if(contact){
            this.contact = {
                type: contact.type,
                content: contact.content,
                lastName: contact.lastName,
                firstName: contact.firstName,
                lastNameKana: contact.lastNameKana,
                firstNameKana: contact.firstNameKana,
                email: contact.email
            }
        }
    },
    computed: {
        ...mapGetters({
            isAuthenticated: 'auth/isAuthenticated',
            getCurrentUser: 'auth/getCurrentUser'
        })
    },
    components : {
        headerComponent,
        PrivacyComponent,
        footerComponent
    },
    data(){
        return{
            contact:{
                type: '--',
                content: '',
                lastName: '',
                firstName: '',
                lastNameKana: '',
                firstNameKana: '',
                email: '',
                emailConfirm: '',
                is_checked: false
            },
            errors: {
                type: '',
                content: '',
                lastName: '',
                firstName: '',
                lastNameKana: '',
                firstNameKana: '',
                email: '',
                emailConfirm: '',
                is_checked: ''
            }
        }
    },
    methods : {
        back() {
            localStorage.removeItem('contact')
            window.history.back()
        },
        submit(){
            if(!this.validate()) return
            localStorage.setItem('contact', JSON.stringify(this.contact))
            this.$router.push({ name: "confirm-contact" })
        },
        validEmail: function (email) {
            var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        validate(){
            let is_type_valid = true
            let is_content_valid = true
            let is_lastName_valid = true
            let is_firstName_valid = true
            let is_lastNameKana_valid = true
            let is_firstNameKana_valid = true
            let is_email_valid = true
            let is_emailConfrim_valid = true
            let is_privacy_valid = true
            
            this.errors = {
                type: '',
                content: '',
                lastName: '',
                firstName: '',
                lastNameKana: '',
                firstNameKana: '',
                email: '',
                emailConfirm: '',
                is_checked: ''
            }

            if(this.contact.type === '--'){
                this.errors.type = 'お問い合わせの種類を選択してください。'
                is_type_valid = false
            }
            if(this.contact.content === ''){
                this.errors.content = '入力に誤りがあります。'
                is_content_valid = false
            }
            if(this.contact.lastName === ''){
                this.errors.lastName = '入力に誤りがあります。'
                is_lastName_valid = false
            }
            if(this.contact.firstName === ''){
                this.errors.firstName = '入力に誤りがあります。'
                is_firstName_valid = false
            }
            if(this.contact.lastNameKana === ''){
                this.errors.lastNameKana = '入力に誤りがあります。'
                is_lastNameKana_valid = false
            }
            if(this.contact.firstNameKana === ''){
                this.errors.firstNameKana = '入力に誤りがあります。'
                is_firstNameKana_valid = false
            }
            if(this.contact.email === ''){
                this.errors.email = '入力に誤りがあります。'
                is_email_valid = false
            } else if (!this.validEmail(this.contact.email)){
                this.errors.email = 'メールアドレスの形式に誤りがあります。'
                is_email_valid = false
            }
            if(this.contact.emailConfirm === ''){
                this.errors.emailConfirm = '入力に誤りがあります。'
                is_emailConfrim_valid = false
            } else if (!this.validEmail(this.contact.emailConfirm)){
                this.errors.emailConfirm = 'メールアドレスの形式に誤りがあります。'
                is_emailConfrim_valid = false
            } else if (this.contact.emailConfirm !== this.contact.email){
                this.errors.emailConfirm = 'Email confrim not match'
                is_emailConfrim_valid = false
            }
            if(!this.contact.is_checked){
                 is_privacy_valid = false
            }
            if(is_type_valid && is_content_valid && is_lastName_valid && is_firstName_valid && 
                is_lastNameKana_valid && is_firstNameKana_valid && is_email_valid && 
                is_emailConfrim_valid && is_privacy_valid){
                return true;
            } else {
                return false
            }
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
}
.btn-submit.disable, .btn-submit.disable:hover{
    background-color: #E8D1DF;
}
.checkbox-privacy{
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #88CBEB
}
.checkbox-privacy > label{
    margin-bottom: 0
}
.checkbox-privacy > input[type='checkbox'] {
    width: 16px;
    height: 16px;
    margin-right: 5px;
}
.error{
    color:  #DF6463;
}
#policy{
    padding-bottom: 30px;
    border-bottom: none;
}
#policy .text-center{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
</style>
