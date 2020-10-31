import VueRouter from 'vue-router';
import publicRoutes from './public.js';
import privateRoutes from './private.js';

const userRoutes = publicRoutes.concat(privateRoutes);
const routes = [
  { path: '*', redirect: '/' },
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

export default router;