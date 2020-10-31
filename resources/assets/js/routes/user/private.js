import example from '../../components/ExampleComponent';

const routes = [
  {
      path: '/home',
      name: 'app',
      component: example,
  }
];

export default routes.map(route => {
  return {...route, meta: {public: false}};
});
