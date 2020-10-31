import example from '../../components/ExampleComponent';
import login from '../../pages/admin/login';

const routes = [
  {
    path: '/login',
    name: 'login',
    component: login  
  },
  {
    path: '/homes',
    name: 'admin',
    component: example,
  }
];

export default routes.map(route => {
  const meta = {
    public: true,
    onlyLoggedOut: true
  };
  return { ...route, meta };
});