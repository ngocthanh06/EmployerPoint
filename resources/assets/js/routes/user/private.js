import AdminApp from '../../pages/admin/App.vue';
import demo from '../../components/ExampleComponent.vue';

const routes = [
  {
    path: '/',
    component: AdminApp,
    children: [
      {
        path: 'demo',
        component: demo,
        name: 'demo'
      }
    ]
  }
];

export default routes.map(route => {
  return {...route, meta: {public: false}};
});
