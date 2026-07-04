<template>
  <PublicLayout>

    <!-- ── Hero ───────────────────────────────────────── -->
    <section class="bg-gray-950 py-24 px-4">
      <div class="max-w-7xl mx-auto">
        <p class="text-xs font-semibold uppercase tracking-widest text-green-400 mb-4">Our Story</p>
        <h1 class="text-4xl sm:text-6xl font-black text-white leading-tight mb-6 max-w-3xl">
          Born in Tirana, built on bold ideas.
        </h1>
      </div>
    </section>

    <!-- ── The Beginning ─────────────────────────────── -->
    <section class="bg-white py-20 px-4">
      <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div>
          <p class="text-xs font-semibold uppercase tracking-widest text-green-600 mb-4">Where it all began</p>
          <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mb-6 leading-tight">
            A dream, a press, and a lot of late nights.
          </h2>
          <p class="text-gray-500 leading-relaxed text-base mb-4">PrintOn started with one clear belief: that every business, big or small, deserves to look exceptional. What began as a modest print operation in Tirana quickly became something far more ambitious.</p>
          <p class="text-gray-500 leading-relaxed text-base">From those first business cards and banners, we built a studio that now handles everything from large-format printing to custom 3D LED letters — all under one roof, all crafted with the same care we had on day one.</p>
        </div>

        <!-- Stat card -->
        <div class="grid grid-cols-2 gap-4">
          <div class="bg-gray-950 rounded-2xl p-6 flex flex-col justify-between items-center text-center aspect-square">
            <span class="text-xs font-semibold uppercase tracking-widest text-gray-500">In business since</span>
            <span class="text-5xl sm:text-6xl font-black text-white leading-none">2024</span>
          </div>
          <div class="bg-green-600 rounded-2xl p-6 flex flex-col justify-between items-center text-center aspect-square">
            <span class="text-xs font-semibold uppercase tracking-widest text-green-200">Happy clients</span>
            <span class="text-5xl sm:text-6xl font-black text-white leading-none">100<span class="text-3xl">+</span></span>
          </div>
          <div class="bg-stone-100 rounded-2xl p-6 col-span-2">
            <span class="text-xs font-semibold uppercase tracking-widest text-gray-400 block mb-2">Based in</span>
            <span class="text-2xl font-black text-gray-900">Tiranë, Shqipëri</span>
          </div>
        </div>
      </div>
    </section>

    <!-- ── What we stand for ──────────────────────────── -->
    <section class="bg-white py-20 px-4 border-t border-gray-100">
      <div class="max-w-7xl mx-auto">
        <p class="text-xs font-semibold uppercase tracking-widest text-green-600 mb-3">What drives us</p>
        <h2 class="text-3xl font-black text-gray-900 mb-12">Three things we never compromise on.</h2>

        <div class="grid sm:grid-cols-3 gap-6">
          <div v-for="v in values" :key="v.icon" class="group p-7 rounded-2xl border border-gray-100 hover:border-green-200 hover:shadow-lg hover:shadow-green-50/60 transition-all duration-200">
            <div class="w-11 h-11 rounded-xl bg-gray-50 group-hover:bg-green-50 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="v.icon"/>
              </svg>
            </div>
            <h3 class="font-bold text-gray-900 mb-2">{{ v.title }}</h3>
            <p class="text-sm text-gray-500 leading-relaxed">{{ v.desc }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ── CTA — Be part of our history ──────────────── -->
    <section class="bg-gray-950 py-24 px-4 text-center">
      <p class="text-xs font-semibold uppercase tracking-widest text-green-400 mb-5">Join the story</p>
      <h2 class="text-4xl sm:text-5xl font-black text-white mb-5 max-w-2xl mx-auto leading-tight">
        Be part of our history.
      </h2>
      <p class="text-gray-400 text-base max-w-lg mx-auto mb-10 leading-relaxed">
        Every great brand has a story. Let's work together to write your next chapter — with print that people actually notice.
      </p>
      <div class="flex flex-wrap items-center justify-center gap-4">
        <RouterLink
          to="/contact"
          class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-500 text-white font-semibold px-8 py-3.5 rounded-full text-sm transition-all duration-200 hover:scale-105"
        >
          Get in Touch
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </RouterLink>
      </div>
    </section>

  </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';

const timeline = [
  {
    year: '2018',
    title: 'The first press.',
    desc:  'We opened our doors. The first jobs were business cards, flyers, and stubborn banner orders — each one teaching us something new.',
  },
  {
    year: '2019',
    title: 'First big signage installation.',
    desc:  'A full retail storefront in central Tirana. The kind of project that made people stop and look — and made us realise what we were truly capable of.',
  },
  {
    year: '2020',
    title: 'The city lit up.',
    desc:  'We expanded into 3D LED letters and illuminated signage. Suddenly our work wasn\'t just printed — it glowed.',
  },
  {
    year: '2022',
    title: 'A growing family of clients.',
    desc:  'Restaurants, shops, offices, events — over 50 active clients trusting us with their brand\'s face. Every one of them a story we\'re proud to be part of.',
  },
  {
    year: '2024',
    title: 'Today — and beyond.',
    desc:  'A full-service advertising studio with a team that sweats the details. We\'re still that small, passionate crew from 2018 — just with a lot more tools and a lot more stories to tell.',
  },
];

const values = [
  {
    icon: 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
    title: 'Quality, always.',
    desc:  'We\'d rather take an extra hour than send out something we\'re not proud of. Every project gets the same level of obsessive attention.',
  },
  {
    icon: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
    title: 'We care about your brand.',
    desc:  'Your logo on a sign isn\'t just a job to us. It\'s your business\'s face to the world — and we treat it that way.',
  },
  {
    icon: 'M13 10V3L4 14h7v7l9-11h-7z',
    title: 'Speed without shortcuts.',
    desc:  'Fast turnarounds are part of our DNA. But we\'ve never cut a corner to hit a deadline — and we never will.',
  },
];
</script>
