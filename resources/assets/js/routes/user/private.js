import content from '../../pages/user/layouts/content';
import home from '../../pages/user/home';

const routes = [
  {
    path: '/',
    component: content,
    children: [
      {
        path: 'home',
        component: home,
        name: 'home'
      }
    ]
  }
];

export default routes.map(route => {
  return {...route, meta: {public: false}};
});
