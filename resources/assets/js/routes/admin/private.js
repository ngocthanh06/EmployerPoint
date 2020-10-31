import example from '../../components/ExampleComponent';

const routes = [
];

export default routes.map(route => {
  return {...route, meta: {public: false}};
});
