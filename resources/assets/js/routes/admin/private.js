import content from '../../pages/admin/layouts/content';
import listUser from '../../pages/admin/listUser/index.vue';
import AddUser from '../../pages/admin/listUser/addUser';

const routes = [
  {
    path: '/admin',
    component: content,
    children: [
      {
        path: 'list-user',
        name: 'ListUser',
        component: listUser
      },

      {
        path: 'add-user',
        name: 'AddUser',
        component: AddUser,
      }
    ]
  },
];

export default routes.map(route => {
  return {...route, meta: {public: false}};
});
