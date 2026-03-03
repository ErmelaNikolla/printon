<template>
  <PublicLayout>

    <!-- ═══════════════════════════════════════════════════ -->
    <!-- HERO                                                -->
    <!-- ═══════════════════════════════════════════════════ -->
    <section
      class="relative bg-gray-950 flex items-center justify-center overflow-hidden"
      style="min-height: calc(100vh - 4rem);"
    >
      <!-- Dot grid texture -->
      <div
        class="absolute inset-0 opacity-25"
        style="background-image: radial-gradient(circle, #374151 1px, transparent 1px); background-size: 30px 30px;"
      />
      <!-- Subtle radial glow -->
      <div
        class="absolute inset-0 pointer-events-none"
        style="background: radial-gradient(ellipse 80% 60% at 50% 40%, rgba(22,163,74,0.08) 0%, transparent 70%);"
      />

      <div class="relative z-10 text-center px-4 max-w-4xl mx-auto py-20">

        <!-- Eyebrow label -->
        <p class="text-green-400/60 text-xs font-semibold uppercase tracking-[0.35em] mb-8">
          Print &nbsp;·&nbsp; Signage &nbsp;·&nbsp; Branding
        </p>

        <!-- Main headline -->
        <h1 class="text-5xl sm:text-6xl lg:text-8xl font-black text-white leading-[0.95] tracking-tight mb-6">
          Your Vision.<br>
          <span class="text-green-400">Our Craft.</span>
        </h1>

        <!-- Tagline -->
        <p class="text-gray-400 text-lg sm:text-xl max-w-lg mx-auto mb-12 leading-relaxed">
          {{ t('hero_description') }}
        </p>

        <!-- CTA buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <Link
            :href="route('orders')"
            class="inline-flex items-center gap-2.5 bg-green-600 hover:bg-green-500 text-white font-semibold px-8 py-3.5 rounded-full transition-all duration-200 hover:gap-3.5"
          >
            {{ t('hero_cta') }}
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </Link>
          <button
            @click="scrollTo('gallery')"
            class="text-gray-500 hover:text-white text-sm font-medium transition-colors underline underline-offset-4 decoration-gray-700 hover:decoration-gray-400"
          >
            {{ t('gallery_title') }} ↓
          </button>
        </div>

      </div>

      <!-- Scroll line indicator -->
      <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center">
        <div class="w-px h-12 bg-gradient-to-b from-transparent via-green-500/30 to-transparent" />
      </div>
    </section>


    <!-- ═══════════════════════════════════════════════════ -->
    <!-- SERVICES                                            -->
    <!-- ═══════════════════════════════════════════════════ -->
    <section class="bg-white py-24 px-4">
      <div class="max-w-7xl mx-auto">

        <div class="text-center mb-16">
          <p class="text-green-500 text-xs font-semibold uppercase tracking-widest mb-3">
            {{ t('services_title') }}
          </p>
          <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">
            {{ t('services_subtitle') }}
          </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

          <!-- Digital Printing -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 17H7a2 2 0 01-2-2V9a2 2 0 012-2h10a2 2 0 012 2v6a2 2 0 01-2 2zM9 7V5a2 2 0 012-2h2a2 2 0 012 2v2m-6 7h.01M15 14h.01"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">{{ t('service_digital') }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ t('service_digital_desc') }}</p>
          </div>

          <!-- Large Format -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">{{ t('service_large_format') }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ t('service_large_format_desc') }}</p>
          </div>

          <!-- Business Cards -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M3 6h18M3 14h18M3 18h10"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">{{ t('service_business_cards') }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ t('service_business_cards_desc') }}</p>
          </div>

          <!-- Signage -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">{{ t('service_signage') }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ t('service_signage_desc') }}</p>
          </div>

          <!-- Stickers -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">{{ t('service_stickers') }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ t('service_stickers_desc') }}</p>
          </div>

          <!-- Branding -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">{{ t('service_branding') }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ t('service_branding_desc') }}</p>
          </div>

        </div>
      </div>
    </section>


    <!-- ═══════════════════════════════════════════════════ -->
    <!-- WHY US — Stats                                      -->
    <!-- ═══════════════════════════════════════════════════ -->
    <section class="bg-gray-950 py-20 px-4">
      <div class="max-w-7xl mx-auto">

        <div class="text-center mb-14">
          <p class="text-green-400/60 text-xs font-semibold uppercase tracking-widest mb-3">
            {{ t('why_title') }}
          </p>
          <h2 class="text-3xl sm:text-4xl font-bold text-white">
            {{ t('why_subtitle') }}
          </h2>
        </div>

        <!-- Stats grid with dividers -->
        <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-y lg:divide-y-0 divide-white/[0.06] border border-white/[0.06] rounded-2xl overflow-hidden">
          <div class="bg-gray-950 px-8 py-10 text-center">
            <div class="text-4xl sm:text-5xl font-black text-green-400 mb-2">10+</div>
            <div class="text-gray-500 text-sm">{{ t('why_stat_years_label') }}</div>
          </div>
          <div class="bg-gray-950 px-8 py-10 text-center">
            <div class="text-4xl sm:text-5xl font-black text-green-400 mb-2">500+</div>
            <div class="text-gray-500 text-sm">{{ t('why_stat_clients_label') }}</div>
          </div>
          <div class="bg-gray-950 px-8 py-10 text-center">
            <div class="text-4xl sm:text-5xl font-black text-green-400 mb-2">1000+</div>
            <div class="text-gray-500 text-sm">{{ t('why_stat_projects_label') }}</div>
          </div>
          <div class="bg-gray-950 px-8 py-10 text-center">
            <div class="text-4xl sm:text-5xl font-black text-green-400 mb-2">48h</div>
            <div class="text-gray-500 text-sm">{{ t('why_stat_turnaround_label') }}</div>
          </div>
        </div>

      </div>
    </section>


    <!-- ═══════════════════════════════════════════════════ -->
    <!-- CHAT CTA — Meet Rei                                 -->
    <!-- ═══════════════════════════════════════════════════ -->
    <section class="bg-gray-950 py-20 px-4 relative overflow-hidden">
      <div
        class="absolute inset-0 pointer-events-none"
        style="background: radial-gradient(ellipse 60% 80% at 50% 50%, rgba(22,163,74,0.07) 0%, transparent 70%);"
      />
      <div class="relative z-10 max-w-xl mx-auto text-center">
        <div class="w-16 h-16 rounded-full bg-green-600 flex items-center justify-center mx-auto mb-6 shadow-lg shadow-green-900/40">
          <span class="text-white text-2xl font-black select-none">R</span>
        </div>
        <p class="text-green-400/60 text-xs font-semibold uppercase tracking-widest mb-4">Meet Rei</p>
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4 leading-tight">
          Got a project in mind?<br>
          <span class="text-green-400">Let's talk.</span>
        </h2>
        <p class="text-gray-500 text-base mb-10 max-w-sm mx-auto leading-relaxed">
          Chat with Rei — tell us what you need and we'll come back with a quote.
        </p>
        <button
          @click="openChat"
          class="inline-flex items-center gap-2.5 bg-white hover:bg-gray-100 text-gray-950 font-semibold px-8 py-3.5 rounded-full transition-all duration-200"
        >
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
          </svg>
          Start a conversation
        </button>
      </div>
    </section>


    <!-- ═══════════════════════════════════════════════════ -->
    <!-- GALLERY                                             -->
    <!-- ═══════════════════════════════════════════════════ -->
    <section id="gallery" class="bg-gray-50 py-24 px-4">
      <div class="max-w-7xl mx-auto">

        <div class="text-center mb-14">
          <p class="text-green-500 text-xs font-semibold uppercase tracking-widest mb-3">
            {{ t('gallery_title') }}
          </p>
          <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">
            {{ t('gallery_subtitle') }}
          </h2>
        </div>

        <!-- Empty state -->
        <div v-if="posts.length === 0" class="text-center text-gray-400 py-20">
          <svg class="w-10 h-10 mx-auto mb-4 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          <p class="text-sm">{{ t('gallery_empty') }}</p>
        </div>

        <!-- Masonry grid -->
        <div v-else class="columns-1 sm:columns-2 lg:columns-3 gap-5 space-y-5">
          <div
            v-for="post in posts"
            :key="post.id"
            class="break-inside-avoid bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5"
          >
            <!-- Image -->
            <template v-if="post.type === 'image' && post.image_url">
              <img
                :src="post.image_url"
                :alt="post.title[locale] || ''"
                class="w-full object-cover"
                loading="lazy"
              />
            </template>

            <!-- Video upload -->
            <template v-else-if="post.type === 'video_upload' && post.video_file_url">
              <video :src="post.video_file_url" controls class="w-full" preload="metadata" />
            </template>

            <!-- Video link -->
            <template v-else-if="post.type === 'video_link' && post.video_url">
              <div class="relative w-full aspect-video">
                <iframe
                  v-if="isYoutube(post.video_url)"
                  :src="youtubeEmbedUrl(post.video_url)"
                  class="absolute inset-0 w-full h-full"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                />
                <a
                  v-else
                  :href="post.video_url"
                  target="_blank"
                  rel="noopener"
                  class="absolute inset-0 flex items-center justify-center bg-gray-50 hover:bg-gray-100 transition-colors"
                >
                  <span class="text-sm text-blue-600 underline px-4 text-center break-all">{{ post.video_url }}</span>
                </a>
              </div>
            </template>

            <!-- Caption -->
            <div v-if="post.title[locale] || post.description[locale]" class="px-5 py-4">
              <h3 v-if="post.title[locale]" class="font-semibold text-gray-900 text-sm mb-1">
                {{ post.title[locale] }}
              </h3>
              <p v-if="post.description[locale]" class="text-gray-400 text-xs leading-relaxed">
                {{ post.description[locale] }}
              </p>
            </div>
          </div>
        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-14">
          <Link
            :href="route('orders')"
            class="inline-flex items-center gap-2.5 border-2 border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 font-semibold px-8 py-3.5 rounded-full transition-all duration-200 hover:gap-3.5"
          >
            {{ t('hero_cta') }}
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </Link>
        </div>

      </div>
    </section>

  </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
  posts: Array,
});

const page = usePage();
const locale = computed(() => page.props.locale);
const translations = computed(() => page.props.translations || {});

function t(key) {
  return translations.value[key] || key;
}

// ── Open Rei chat ──────────────────────────────────────
function openChat() {
  window.dispatchEvent(new CustomEvent('open-rei-chat'));
}

// ── Scroll helper ──────────────────────────────────────
function scrollTo(id) {
  document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' });
}

// ── Gallery helpers ────────────────────────────────────
function isYoutube(url) {
  return url && (url.includes('youtube.com') || url.includes('youtu.be'));
}

function youtubeEmbedUrl(url) {
  const match = url.match(/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
  if (match) return `https://www.youtube.com/embed/${match[1]}`;
  return url;
}
</script>
