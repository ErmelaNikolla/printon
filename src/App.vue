<template>
  <!-- key: remount on route change so each page's SEO head is fresh -->
  <RouterView :key="$route.path" />
</template>

<script setup>
import { useHead } from '@unhead/vue';
import { localBusinessJsonLd, SITE_URL } from '@/seo';

// Site-wide structured data (on every page)
useHead({
  meta: [
    { name: 'theme-color', content: '#030712' },
    { name: 'geo.region', content: 'AL-11' },
    { name: 'geo.placename', content: 'Tiranë' },
  ],
  script: [
    {
      type: 'application/ld+json',
      innerHTML: JSON.stringify(localBusinessJsonLd),
    },
    {
      type: 'application/ld+json',
      innerHTML: JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'WebSite',
        name: 'PrintOn',
        url: `${SITE_URL}/`,
        inLanguage: ['sq', 'en'],
      }),
    },
  ],
});
</script>
