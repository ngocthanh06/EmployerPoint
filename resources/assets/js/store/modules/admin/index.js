import Http from '../../../utils/Http';
import { APP_AUTH_ADMIN } from '../../../config';
import { transError } from '../../modules/helpers';
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
  authenticate(context, formInput) {
    axios.post('login', formInput)
    .then(({ data }) => {
      if (!data.access_token) {
        return false;
      }

      let { access_token: token, admin, code } = data;
      context.commit('setIsAuthenticate', true);
      context.commit('setAdmin', admin);
      localStorage.setItem(APP_AUTH_ADMIN, token);
    })

  },

  listUser(context) {
    return new Promise((resolve, reject) => {
      new Http().authenticated(context.state.authType)
      .get('list-user')
        .then(response => {
          console.log(response)
        });
    });
  },

  addUser(context, data) {
    return new Promise((resolve, reject) => {
      new Http().authenticated(context.state.authType)
      .post('add-user', data)
        .then(response => {
          console.log(response)
        });
    });
  }
}

export default {
  state,
  getters,
  mutations,
  actions,
  namespaced: true
};
