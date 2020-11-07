import axios from 'axios';
import { APP_USER_API_URL } from '../../config';
import codeResponse from '../../utils/code.response';

const DEFAULT_CONFIG = {
  baseURL: APP_USER_API_URL,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  }
};

export default class Http {
  constructor(config = {}) {
    this.config = Object.assign({}, DEFAULT_CONFIG, config);
  }

  authenticated(guardName) {
    document.execCommand('ClearAuthenticationCache', 'false');
    const token = localStorage.getItem(guardName);
    if (token) {
      this.config.headers.Authorization = token;
    }

    return this;
  }

  get(url, params, config = {}) {
    return this.executeRequest(url, { ...config, params });
  }

  post(url, data, config = {}) {
    return this.executeRequest(url, { method: 'post', ...config, data });
  }

  put(url, data, config = {}) {
    return this.executeRequest(url, { method: 'put', ...config, data });
  }

  patch(url, data, config = {}) {
    return this.executeRequest(url, { method: 'patch', ...config, data });
  }

  delete(url, data, config = {}) {
    return this.executeRequest(url, { method: 'delete', ...config, data });
  }

  executeRequest(url, config) {
    const finalHeaderConfig = {
      ...this.config.headers,
      ...config.headers
    };

    const finalConfig = {
      ...this.config,
      url,
      ...config,
      headers: { ...finalHeaderConfig }
    };

    return axios.request(finalConfig)
      .then((response) => {
        let { data } = response;
        let {admin_not_found : adminNotFound} = codeResponse.user;
        if ([
          codeResponse.auth.token_absent,
          codeResponse.auth.token_expired,
          codeResponse.auth.token_blacklisted,
          codeResponse.user.user_not_found,
          codeResponse.auth.token_invalid,
          adminNotFound
        ].indexOf(data.code) >= 0) {
          console.log('logout');
          let guard = 'user';
          let redirectUrl = '/login';

          if ([adminNotFound].indexOf(data.code) != -1) {
            guard = 'admin';
            redirectUrl = '/admin/login';
          }

          localStorage.removeItem(guard);
          let fromUrl = window.location.href;
          window.location.href = redirectUrl + '?action=' + fromUrl;

          return Promise.reject(response);
        }

        return Promise.resolve(data);
      }).catch(error => {
        // if (error.response.status === codeResponse.server_error) {
        //   window.location.href = '/login';
        //   // prevent loop redirect login -> action
        //   localStorage.removeItem('user');
        // }

        return Promise.reject(error);
      });
  }
}


