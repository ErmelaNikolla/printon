import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Contact from './pages/Contact.vue';

// Every static route here is pre-rendered to its own HTML file by vite-ssg.
// Page titles / meta live in each page via usePageSeo() (src/seo.js).
export const routes = [
  { path: '/', name: 'home', component: Home },
  { path: '/about', name: 'about', component: About },
  { path: '/contact', name: 'contact', component: Contact },
  { path: '/:pathMatch(.*)*', redirect: '/' },
];

export function scrollBehavior() {
  return { top: 0 };
}
