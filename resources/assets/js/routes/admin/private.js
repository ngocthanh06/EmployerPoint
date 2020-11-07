import content from '../../pages/admin/layouts/content';
import listUser from '../../pages/admin/listUser/index.vue';
import AddUser from '../../pages/admin/listUser/addUser';
import ListPoint from '../../pages/admin/points/listPoint';
import Point from '../../pages/admin/points/point';
import EditUser from '../../pages/admin/listUser/editUser';

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
      },

      {
        path: 'list-point',
        name: 'ListPoint',
        component: ListPoint,
      },

      {
        path: 'point/:id',
        name: 'point',
        component: Point,
      },

      {
        path: 'edit-user/:id',
        name: 'EditUser',
        component: EditUser
      }
    ]
  },
];

export default routes.map(route => {
  return {...route, meta: {public: false}};
});
