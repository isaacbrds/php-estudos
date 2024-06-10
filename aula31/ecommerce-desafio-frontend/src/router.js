
import { createRouter, createWebHistory } from 'vue-router';

// Importar seus componentes
import Home from './pages/Home.vue';

// Definir as rotas
const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  }
];

// Criar o roteador
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;