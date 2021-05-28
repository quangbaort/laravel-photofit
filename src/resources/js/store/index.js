import Vue from 'vue';
import Vuex from 'vuex';

import { auth } from './modules/auth';

Vue.use(Vuex);

export default new Vuex.Store({
  state:{
    showLoginModal: false,
    showSubMenu: true
  },
  mutations: {
    TOGGLE_LOGIN_MODAL(state, data){
      state.showLoginModal = data
    },
    TOGGLE_NEWS_MODAL(state, data){
      state.showLoginModal = data
    },
    TOGGLE_SUB_MENU(state, data){
      state.showSubMenu = data
    }
  },
  getters: {
    isShowSubMenu (state){
      return state.showSubMenu
    }
  },
  modules: {
    auth
  }
})