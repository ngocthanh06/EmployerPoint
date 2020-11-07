import VueRouter from 'vue-router';
import store from '../../store/admin';
import publicRoutes from './public.js';
import privateRoutes from './private.js';

const userRoutes = publicRoutes.concat(privateRoutes);
const routes = [
  { 
    path: '*',
    redirect: 'admin/404'
  },
];

const router = new VueRouter({
  scrollBehavior(to, from, savedPosition) {
    return {
      x: 0,
      y: 0
    };
  },
  routes: routes.concat(userRoutes),
  mode: 'history'
});

router.beforeEach((to, from, next) => {
  const isAuthenticate = store.getters[ 'adminAuth/getIsAuthenticate' ];
  const onlyLoggedOut = to.matched.some(record => record.meta.onlyLoggedOut);
  const isPublic = to.matched.some(record => record.meta.public);
  
  if (!isPublic && !isAuthenticate) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    return next({
      path: '/admin/login',
      query: { redirect: to.fullPath }
    });
  }

  if (isAuthenticate && onlyLoggedOut || !to.matched.length) {
    return next('/admin/list-user');
  }
  next();
});

export default router;