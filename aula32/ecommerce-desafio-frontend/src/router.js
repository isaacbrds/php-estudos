
import { createRouter, createWebHistory } from 'vue-router';

// Importar seus componentes
import Home from './pages/Home.vue';
import Clientes from './pages/Clientes.vue';
import Pedidos from './pages/Pedidos.vue';
import Login from './pages/Login.vue';

// Definir as rotas
const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },{
    path: '/login',
    name: 'login',
    component: Login,
  },{
    path: '/clientes',
    name: 'Clientes',
    component: Clientes , meta: {requiresAuth: true},
  },{
    path: '/pedidos',
    name: 'Pedidos',
    component: Pedidos , meta: {requiresAuth: true},
  }
];

// Criar o roteador
const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const loggedIn = localStorage.getItem('token');
  if(to.matched.some( record => record.meta.requiresAuth) && !loggedIn){
    next('/login');
  }else{
    next();
  }
});

export default router;