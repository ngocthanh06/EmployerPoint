import example from '../../components/ExampleComponent';
import login from '../../pages/user/login';

const routes = [
  {
    path: '/admin/login',
    name: 'login',
    component: login
  },
];

export default routes.map(route => {
  const meta = {
    public: true,
    onlyLoggedOut: true
  };
  return { ...route, meta };
});