import content from '../../pages/admin/layouts/content';
import listUser from '../../pages/admin/listUser/index.vue';

const routes = [
  {
    path: '/admin',
    component: content,
    children: [
      {
        path: 'list-user',
        name: 'ListUser',
        component: listUser
      }
    ]
  },
];

export default routes.map(route => {
  return {...route, meta: {public: false}};
});
