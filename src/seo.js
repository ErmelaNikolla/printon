import { useHead } from '@unhead/vue';

export const SITE_URL = 'https://printonreklama.com';
export const SITE_NAME = 'PrintOn';
export const DEFAULT_IMAGE = `${SITE_URL}/og-image.png`;

/**
 * Per-page SEO: <title>, description, canonical, Open Graph, Twitter card,
 * <html lang> and optional JSON-LD blocks. Rendered into static HTML at build
 * time by vite-ssg, so crawlers and link previews see it without running JS.
 */
export function usePageSeo({ title, description, path, lang = 'en', image = DEFAULT_IMAGE, jsonLd = [] }) {
  const url = SITE_URL + (path === '/' ? '/' : path);
  const locale = lang === 'sq' ? 'sq_AL' : 'en_US';

  useHead({
    title,
    htmlAttrs: { lang },
    meta: [
      { name: 'description', content: description },
      { property: 'og:type', content: 'website' },
      { property: 'og:site_name', content: SITE_NAME },
      { property: 'og:locale', content: locale },
      { property: 'og:title', content: title },
      { property: 'og:description', content: description },
      { property: 'og:url', content: url },
      { property: 'og:image', content: image },
      { name: 'twitter:card', content: 'summary_large_image' },
      { name: 'twitter:title', content: title },
      { name: 'twitter:description', content: description },
      { name: 'twitter:image', content: image },
    ],
    link: [{ rel: 'canonical', href: url }],
    script: jsonLd.map((data) => ({
      type: 'application/ld+json',
      innerHTML: JSON.stringify(data),
    })),
  });
}

/** Site-wide business info — keep identical everywhere (Google Business Profile too). */
export const localBusinessJsonLd = {
  '@context': 'https://schema.org',
  '@type': 'LocalBusiness',
  '@id': `${SITE_URL}/#business`,
  name: 'PrintOn',
  alternateName: 'PrintOn Reklama',
  description:
    'Studio reklamash dhe printimi në Tiranë: shkronja 3D me LED, tabela, banera, ngjitëse, printim dixhital dhe branding.',
  url: `${SITE_URL}/`,
  logo: `${SITE_URL}/logo/logo_Printon.svg`,
  image: DEFAULT_IMAGE,
  telephone: '+355698992158',
  email: 'printon.reklama@gmail.com',
  address: {
    '@type': 'PostalAddress',
    streetAddress: 'Rruga Sadik Petrela',
    addressLocality: 'Tiranë',
    addressRegion: 'Tiranë',
    addressCountry: 'AL',
  },
  areaServed: [
    { '@type': 'City', name: 'Tiranë' },
    { '@type': 'Country', name: 'Shqipëri' },
  ],
  openingHoursSpecification: [
    {
      '@type': 'OpeningHoursSpecification',
      dayOfWeek: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
      opens: '09:00',
      closes: '18:00',
    },
    {
      '@type': 'OpeningHoursSpecification',
      dayOfWeek: 'Saturday',
      opens: '10:00',
      closes: '14:00',
    },
  ],
  knowsAbout: [
    'Reklama', 'Printim', 'Shkronja 3D', 'Shkronja LED', 'Tabela', 'Banera',
    'Ngjitëse', 'Printim në adeziv', 'Roll-up', 'Kuti drite', 'Branding',
    'Printing', '3D LED letters', 'Signage', 'Stickers', 'Large format printing',
  ],
};
