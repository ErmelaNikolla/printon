import { createRouter, createWebHistory } from 'vue-router';
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Contact from './pages/Contact.vue';

const routes = [
  { path: '/', name: 'home', component: Home, meta: { title: 'PrintOn — Printing & Advertising in Tirana' } },
  { path: '/about', name: 'about', component: About, meta: { title: 'About Us — PrintOn' } },
  { path: '/contact', name: 'contact', component: Contact, meta: { title: 'Contact — PrintOn' } },
  { path: '/:pathMatch(.*)*', redirect: '/' },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior() {
    return { top: 0 };
  },
});

// Set the browser tab / SEO title per page
router.afterEach((to) => {
  document.title = to.meta.title || 'PrintOn';
});

export default router;
