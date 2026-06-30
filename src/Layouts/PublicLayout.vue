<template>
  <div class="min-h-screen flex flex-col bg-white">

    <!-- ── Navbar ───────────────────────────────── -->
    <nav class="sticky top-0 z-50 bg-gray-950 border-b border-white/[0.06]">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

          <!-- Logo -->
          <RouterLink to="/" class="flex items-center">
            <img src="/logo/logo_Printon.svg" alt="PrintOn" class="h-7 w-auto" />
          </RouterLink>

          <!-- Links -->
          <div class="flex items-center gap-7">
            <RouterLink
              to="/"
              class="text-gray-400 hover:text-white text-sm font-medium transition-colors hidden sm:block"
            >
              Home
            </RouterLink>
            <RouterLink
              to="/about"
              class="text-gray-400 hover:text-white text-sm font-medium transition-colors hidden sm:block"
            >
              About Us
            </RouterLink>
            <RouterLink
              to="/contact"
              class="text-gray-400 hover:text-white text-sm font-medium transition-colors hidden sm:block"
            >
              Contact
            </RouterLink>
            <RouterLink
              to="/contact"
              class="bg-green-600 hover:bg-green-500 text-white text-sm font-semibold px-5 py-1.5 rounded-full transition-colors"
            >
              Get a Quote
            </RouterLink>
          </div>

        </div>
      </div>
    </nav>

    <!-- ── Page content ──────────────────────────── -->
    <main class="flex-1">
      <slot />
    </main>

    <!-- ── Floating WhatsApp button ──────────────── -->
    <WhatsAppButton />

    <!-- ── Footer ────────────────────────────────── -->
    <footer class="bg-gray-950 text-gray-400 border-t border-white/[0.06]">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-12">

          <!-- Shop -->
          <div>
            <h3 class="text-white text-xs font-semibold uppercase tracking-widest mb-5">
              Shop
            </h3>
            <ul class="space-y-2.5 text-sm">
              <li v-for="s in footerShop" :key="s" class="text-gray-500">{{ s }}</li>
            </ul>
          </div>

          <!-- Services -->
          <div>
            <h3 class="text-white text-xs font-semibold uppercase tracking-widest mb-5">
              Services
            </h3>
            <ul class="space-y-2.5 text-sm">
              <li v-for="s in footerSvc" :key="s" class="text-gray-500">{{ s }}</li>
            </ul>
          </div>

          <!-- Contact -->
          <div>
            <h3 class="text-white text-xs font-semibold uppercase tracking-widest mb-5">
              Contact
            </h3>
            <ul class="space-y-3 text-sm">
              <li>
                <a href="tel:+355698992158" class="flex items-center gap-3 hover:text-white transition-colors group">
                  <span class="w-7 h-7 rounded-full bg-white/5 group-hover:bg-green-600/20 flex items-center justify-center shrink-0 transition-colors">
                    <svg class="w-3.5 h-3.5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                  </span>
                  069 899 2158
                </a>
              </li>
              <li>
                <a href="https://wa.me/355698992158" target="_blank" rel="noopener" class="flex items-center gap-3 hover:text-white transition-colors group">
                  <span class="w-7 h-7 rounded-full bg-white/5 group-hover:bg-green-600/20 flex items-center justify-center shrink-0 transition-colors">
                    <svg class="w-3.5 h-3.5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                  </span>
                  WhatsApp
                </a>
              </li>
              <li>
                <a href="mailto:printon.reklama@gmail.com" class="flex items-center gap-3 hover:text-white transition-colors group">
                  <span class="w-7 h-7 rounded-full bg-white/5 group-hover:bg-green-600/20 flex items-center justify-center shrink-0 transition-colors">
                    <svg class="w-3.5 h-3.5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                  </span>
                  printon.reklama@gmail.com
                </a>
              </li>
            </ul>
          </div>

        </div>
      </div>

      <!-- Bottom bar -->
      <div class="border-t border-white/[0.04]">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-gray-700">
          <span>&copy; {{ year }} PrintOn. All rights reserved.</span>
          <div class="text-4xl font-black text-white/[0.04] select-none tracking-tight leading-none">PrintOn</div>
        </div>
      </div>
    </footer>

  </div>
</template>

<script setup>
import WhatsAppButton from '@/Components/WhatsAppButton.vue';

const year = new Date().getFullYear();

const footerShop = [
  'Signage',
  'Prints',
  'Personalized Gifts',
  'Illuminated Signs',
  'Promotional Products',
];

const footerSvc = [
  'Design',
  'Web Design',
  '3D Letters',
  'Illuminated Signage',
  'Signage',
];
</script>
