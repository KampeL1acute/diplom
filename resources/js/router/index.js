import { createRouter, createWebHistory } from 'vue-router';
import Bookpage from '../components/Bookpage.vue';
import Book from '../components/Book.vue';
import Readtext from '../components/Readtext.vue';

const routes = [
  { path: '/', component: Bookpage },
  { path: '/books/:id', component: Book },
  { path: '/books/:id', component: Readtext }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;