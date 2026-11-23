import './style.css';
import { ViteSSG } from 'vite-ssg';
import App from './App.vue';
import { routes, scrollBehavior } from './router';

// vite-ssg: SPA in dev, pre-rendered static HTML per route on `npm run build`.
export const createApp = ViteSSG(App, { routes, scrollBehavior });
