import { APP_AUTH_USER } from '../../../config';
import Http from '../../../utils/user/http';
import { transError } from '../../modules/helpers';
import axios from 'axios';

const state = {
  isAuthenticate: !!localStorage.getItem(APP_AUTH_USER),
  authType: APP_AUTH_USER,
  isLoading: false,
  admin: {}
};

const getters = {
  getIsAuthenticate: state => state.isAuthenticate,
  getUser: state => state.admin
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
    axios.post('api/login', formInput)
    .then(({ data }) => {
      if (!data.access_token) {
        return false;
      }

      let { access_token: token, user, code } = data;
      context.commit('setIsAuthenticate', true);
      context.commit('setAdmin', user);
      localStorage.setItem(APP_AUTH_USER, token);

    })

  },

  getPoint(context, data) {
    return new Promise((resolve, reject) => {
      new Http().authenticated(context.state.authType)
      .get('get-point', data)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          reject(error);
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
