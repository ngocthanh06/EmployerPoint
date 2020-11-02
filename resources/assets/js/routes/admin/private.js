import example from '../../components/ExampleComponent';
import side from '../../pages/admin/layouts/sidebar';

const routes = [
  {
    path: '/admin/test',
    name: 'side',
    component: side,
  }
];

export default routes.map(route => {
  return {...route, meta: {public: false}};
});
