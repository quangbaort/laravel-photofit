<template>
    <div v-if="$store.state.showLoginModal" class="">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" @click="closeModal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">PhotoSpotで登録されました情報を入力ください</h4>
                                <form @submit.prevent="handleLogin()">
                                    <span class="invalid-feedback" v-if="this.errors.form">{{this.errors.form}}</span>
                                    <div class="form-group">
                                        <div class="hint">
                                            <span class="required">必須</span>
                                            <span class="type">半角</span>
                                        </div>
                                        <input type="email" class="login-input" :class="{'is-invalid' : errors.email}" v-model="userLogin.email" placeholder="メールアドレス">
                                        <span class="invalid-feedback" v-if="this.errors.email">{{this.errors.email}}</span>
                                    </div>
                                    <div class="form-group">
                                        <div class="hint">
                                            <span class="required">必須</span>
                                            <span class="type">半角</span>
                                        </div>
                                        <input type="password" class="login-input" :class="{'is-invalid' : errors.password}"  v-model="userLogin.password" placeholder="パスワード">
                                        <span class="invalid-feedback" v-if="this.errors.password">{{this.errors.password}}</span>
                                    </div>
                                    <div class="action">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="remember"> ログイン状態を維持する</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><v-icon name="spinner" v-if="loading" scale="1" spin="true"/> ログイン</button>
                                        <div class="photo-spot">
                                            <v-icon name="info-circle" style="color: red"/>
                                            <p>パスワードをお忘れの方は、</p>
                                            <p>Photo Spotよりご操作をお願いします</p>
                                            <a href="https://www.photospot.jp/" target="_blank">https://www.photospot.jp/</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
<script>
import authApi from '../api/auth'
import { mapActions } from 'vuex'
export default {
    name : "auth",
    data() {
        return {
            userLogin : {
                email : null,
                password : null ,
            },
            errors : {},
            loading : false,
        }
    },
    methods : {
        ...mapActions({
            loginAction: 'auth/login',
            getCurrentUser: 'auth/getCurrentUser'
        }),
        handleLogin() {
            this.loading = true
            this.errors = {
                email: null,
                password: null,
                form: null
            }
            if(!this.userLogin.email){
                this.errors.email = "このフィールドを入力してください。"
            }
            if(!this.userLogin.password){
                this.errors.password = "このフィールドを入力してください。"
            }
            if (this.userLogin.email && this.userLogin.password) {
                authApi.login('', this.userLogin).then((response) => {
                    let token = response.data.token
                    let user = response.data.user
                    localStorage.setItem('token', token)
                    localStorage.setItem('user', JSON.stringify(user))
                    //save data to state
                    this.loginAction(token)
                    this.getCurrentUser(user)

                    // redirect to next view
                    let urlParams = new URLSearchParams(window.location.search);
                    if (urlParams.has("redirect")) {
                        this.$router.push({ path: `${urlParams.get("redirect")}` });
                    } else this.$router.push({ name: "top" });
                    this.$store.commit('TOGGLE_LOGIN_MODAL', false)
                }).catch((error) => {
                    this.loading = false
                    this.errors.form = "入力されたログインIDパスワードに誤りがあります。"
                })
            } else{
                this.loading = false;
                return;
            }
        },
        closeModal(){
            this.$store.commit('TOGGLE_LOGIN_MODAL', false)
        }
    }
}
</script>
<style scoped>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.modal-body{
    position: relative;
}
.modal-title{
    font-size: 16px;
    padding: 18px;
    font-weight: 600;
}
.form-group{
    position: relative;
}
.hint{
    position: absolute;
    top: 3px;
    right: 0;
    display: flex;
    flex-direction: column;
}
.invalid-feedback{
    display: block;
    color:#f15a5f;
}
.hint > span{
    padding: 3px 7px;
    color: #ffff;
    font-size: 11px;
    margin-bottom: 2px;
}
.hint > span.required{
    background-color: #f15a5f;
}
.hint > span.type{
    background-color: #898989;
}
.close{
    position: absolute;
    color: #2f2f2f;
    padding: 8px;
    top: 0px;
    right: 0px;
}
.action{
    display: flex;
    flex-direction: column;
    align-items: center;
}
.photo-spot{
    padding: 10px 30px;
    text-align: center;
    border: solid red 1px;
    margin: 20px 0;
}
.photo-spot > p{
    margin-bottom: 0;
    color: red;
}
button{
    padding-left: 55px;
    padding-right: 55px;
    background-color: #6c9bd2;
    color: #ffff
}
a{
    color: #6c9bd2;
}
a:hover{
    color: #6c9bd2;
}
.login-input{
    outline: none;
    height: 56px;
    width: 100%;
    border: none;
    border-bottom: solid #aaaaaa 2px;
    padding: 0px 10px
}
.login-input:focus{
    outline: none;
}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #c4c4c6;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #c4c4c6;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: #c4c4c6;
}
</style>
