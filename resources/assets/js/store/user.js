import Vue from 'vue';
import Vuex from 'vuex';
import userAuth from './modules/user/auth';
import user from './modules/user';

Vue.use(Vuex);
const store = new Vuex.Store({
  modules: {
    userAuth,
    user
  }
});

export default store;
