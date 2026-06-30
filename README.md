# PrintOn

Informational website for **PrintOn** — an advertising & printing studio in Tirana, Albania.

Pure front-end: **Vue 3 + Vue Router + Vite + Tailwind CSS v4**. No backend, no database — every enquiry goes through phone, WhatsApp, or email.

## Stack

- **Vue 3** (`<script setup>` SFCs)
- **Vue Router 4** (history mode)
- **Vite 7** (dev server + build)
- **Tailwind CSS v4** (via `@tailwindcss/vite`)

## Development

```bash
npm install
npm run dev      # start the dev server
```

## Build

```bash
npm run build    # outputs to dist/
npm run preview  # preview the production build locally
```

The `dist/` folder is a fully static site — deploy it to any static host
(Netlify, Vercel, GitHub Pages, Cloudflare Pages, or plain nginx/Apache).

> **SPA routing note:** because the app uses history-mode routing, configure
> your host to fall back to `index.html` for unknown paths (Netlify/Vercel do
> this automatically; for nginx use `try_files $uri /index.html`).

## Structure

```
index.html            # Vite entry
public/               # static assets served at site root (logos, favicon)
src/
  main.js             # app bootstrap
  App.vue             # <RouterView>
  router.js           # routes: /, /about, /contact
  style.css           # Tailwind entry
  Layouts/
    PublicLayout.vue  # navbar + footer + Printon chat widget
  Components/
    ChatWidget.vue    # "Printon" chat → WhatsApp (client-side only)
  pages/
    Home.vue
    About.vue
    Contact.vue
```

## Contact details

Phone / WhatsApp: 069 899 2158 · Email: printon.reklama@gmail.com · Tirana, Albania
