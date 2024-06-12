
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
    component: Clientes,
  },{
    path: '/pedidos',
    name: 'Pedidos',
    component: Pedidos,
  }
];

// Criar o roteador
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;