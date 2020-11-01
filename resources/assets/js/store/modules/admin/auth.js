import { APP_AUTH_ADMIN } from '../../../config';
import axios from 'axios';

const state = {
  isAuthenticate: !!localStorage.getItem(APP_AUTH_ADMIN),
  authType: APP_AUTH_ADMIN,
  isLoading: false,
  admin: {}
};

const getters = {
  getIsAuthenticate: state => state.isAuthenticate,
  getAdmin: state => state.admin
}

const mutations = {
  setIsAuthenticate(state, isAuthenticate) {
    state.isAuthenticate = isAuthenticate;
  },
  
  setAdmin(state, admin) {
    state.admin = admin;
  },
}

const actions = {
  authenticate(context, { data }) {
    axios.post('/api/login', data)
    .then((response) => {
        console.log(response);
    })
  }
}

export default {
  state,
  getters,
  mutations,
  actions,
  namespaced: true
};
