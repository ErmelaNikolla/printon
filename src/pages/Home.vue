<template>
  <PublicLayout>

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
          Quality printing for your business and personal needs.
        </p>

        <!-- CTA buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <RouterLink
            to="/contact"
            class="inline-flex items-center gap-2.5 bg-green-600 hover:bg-green-500 text-white font-semibold px-8 py-3.5 rounded-full transition-all duration-200 hover:gap-3.5"
          >
            Get a Quote
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </RouterLink>
          <button
            @click="scrollTo('services')"
            class="text-gray-500 hover:text-white text-sm font-medium transition-colors underline underline-offset-4 decoration-gray-700 hover:decoration-gray-400"
          >
            What We Do ↓
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
    <section id="services" class="bg-white py-24 px-4">
      <div class="max-w-7xl mx-auto">

        <div class="text-center mb-16">
          <p class="text-green-500 text-xs font-semibold uppercase tracking-widest mb-3">
            What We Do
          </p>
          <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">
            From business cards to billboards — we print it all.
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
            <h3 class="font-semibold text-gray-900 mb-2">Digital Printing</h3>
            <p class="text-gray-400 text-sm leading-relaxed">High-quality prints for flyers, brochures, and marketing materials.</p>
          </div>

          <!-- Large Format -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Large Format</h3>
            <p class="text-gray-400 text-sm leading-relaxed">Banners, billboards, and large-scale prints that make an impact.</p>
          </div>

          <!-- Business Cards -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M3 6h18M3 14h18M3 18h10"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Business Cards</h3>
            <p class="text-gray-400 text-sm leading-relaxed">Premium cards designed to make a lasting first impression.</p>
          </div>

          <!-- Signage -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Signage &amp; Displays</h3>
            <p class="text-gray-400 text-sm leading-relaxed">Indoor and outdoor signs, stands, and retail display solutions.</p>
          </div>

          <!-- Stickers -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Stickers &amp; Labels</h3>
            <p class="text-gray-400 text-sm leading-relaxed">Custom stickers and labels for products, packaging, and promotion.</p>
          </div>

          <!-- Branding -->
          <div class="group p-7 rounded-2xl border border-gray-100 hover:border-green-100 hover:shadow-xl hover:shadow-green-50/60 transition-all duration-300 cursor-default">
            <div class="w-11 h-11 rounded-xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center mb-5 transition-colors">
              <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
              </svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Branding &amp; Design</h3>
            <p class="text-gray-400 text-sm leading-relaxed">Logo, identity, and visual communication tailored to your brand.</p>
          </div>

        </div>
      </div>
    </section>


    <!-- ═══════════════════════════════════════════════════ -->
    <!-- FEATURE HIGHLIGHTS                                  -->
    <!-- ═══════════════════════════════════════════════════ -->
    <section class="bg-gray-950 py-24 px-4 border-t border-white/[0.04]">
      <div class="max-w-7xl mx-auto">

        <!-- Header row: bold title left, descriptor right -->
        <div class="flex flex-col lg:flex-row lg:items-end gap-8 mb-16">
          <div class="flex-1">
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[0.95] tracking-tight">
              Your brand.<br>
              <span class="text-green-400">Printed perfectly.</span>
            </h2>
          </div>
          <div class="lg:max-w-xs">
            <p class="text-green-400/60 text-xs font-semibold uppercase tracking-widest mb-3">Why PrintOn</p>
            <p class="text-gray-500 text-sm leading-relaxed">Every detail matters when your brand is on display. We deliver precision, quality, and speed — on every single order.</p>
          </div>
        </div>

        <!-- 4 feature tiles -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">

          <div class="bg-white/[0.03] hover:bg-white/[0.06] border border-white/[0.06] rounded-2xl p-7 transition-colors">
            <div class="w-10 h-10 rounded-xl bg-green-600/10 flex items-center justify-center mb-8">
              <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
              </svg>
            </div>
            <h3 class="text-xs font-black uppercase tracking-widest text-white mb-1">Tailor-made</h3>
            <p class="text-xs text-gray-600 leading-relaxed">every project adapted to your exact dimensions, colors, and vision</p>
          </div>

          <div class="bg-white/[0.03] hover:bg-white/[0.06] border border-white/[0.06] rounded-2xl p-7 transition-colors">
            <div class="w-10 h-10 rounded-xl bg-green-600/10 flex items-center justify-center mb-8">
              <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
              </svg>
            </div>
            <h3 class="text-xs font-black uppercase tracking-widest text-white mb-1">Eye-catching</h3>
            <p class="text-xs text-gray-600 leading-relaxed">premium materials and sharp printing that command attention</p>
          </div>

          <div class="bg-white/[0.03] hover:bg-white/[0.06] border border-white/[0.06] rounded-2xl p-7 transition-colors">
            <div class="w-10 h-10 rounded-xl bg-green-600/10 flex items-center justify-center mb-8">
              <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
              </svg>
            </div>
            <h3 class="text-xs font-black uppercase tracking-widest text-white mb-1">Fast turnaround</h3>
            <p class="text-xs text-gray-600 leading-relaxed">standard orders in 3–5 days — rush production also available</p>
          </div>

          <div class="bg-white/[0.03] hover:bg-white/[0.06] border border-white/[0.06] rounded-2xl p-7 transition-colors">
            <div class="w-10 h-10 rounded-xl bg-green-600/10 flex items-center justify-center mb-8">
              <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
              </svg>
            </div>
            <h3 class="text-xs font-black uppercase tracking-widest text-white mb-1">Built to last</h3>
            <p class="text-xs text-gray-600 leading-relaxed">weather-resistant materials for outdoor, vivid prints for indoor</p>
          </div>

        </div>
      </div>
    </section>


    <!-- ═══════════════════════════════════════════════════ -->
    <!-- 3D LETTERS SPOTLIGHT                               -->
    <!-- ═══════════════════════════════════════════════════ -->
    <section class="bg-stone-100 py-24 px-4">
      <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

        <!-- LEFT: Content -->
        <div>
          <p class="text-green-600 text-xs font-semibold uppercase tracking-widest mb-5">
            3D LED Letters
          </p>
          <h2 class="text-4xl sm:text-5xl font-black text-stone-900 leading-tight mb-4">
            Make your brand impossible to ignore.
          </h2>
          <p class="text-green-700 text-base font-medium mb-5">
            Why choose illuminated letters for your business?
          </p>
          <p class="text-stone-500 text-sm leading-relaxed mb-10">
            Custom 3D LED letters bring your brand off the wall and into the spotlight — day and night. Bold, durable, and built exactly to your specifications.
          </p>

          <!-- 2×2 benefit grid -->
          <div class="grid grid-cols-2 gap-5 mb-10">

            <div class="flex gap-3">
              <div class="w-9 h-9 rounded-lg bg-green-100 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                </svg>
              </div>
              <div>
                <h4 class="text-stone-900 text-xs font-bold uppercase tracking-wider mb-1">Custom-built</h4>
                <p class="text-stone-500 text-xs leading-relaxed">Every letter made to your exact dimensions, font, and color</p>
              </div>
            </div>

            <div class="flex gap-3">
              <div class="w-9 h-9 rounded-lg bg-green-100 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
              </div>
              <div>
                <h4 class="text-stone-900 text-xs font-bold uppercase tracking-wider mb-1">High visibility</h4>
                <p class="text-stone-500 text-xs leading-relaxed">Bright LED illumination that stands out in any light or weather</p>
              </div>
            </div>

            <div class="flex gap-3">
              <div class="w-9 h-9 rounded-lg bg-green-100 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
              </div>
              <div>
                <h4 class="text-stone-900 text-xs font-bold uppercase tracking-wider mb-1">Quick install</h4>
                <p class="text-stone-500 text-xs leading-relaxed">Professional mounting with minimal disruption to your business</p>
              </div>
            </div>

            <div class="flex gap-3">
              <div class="w-9 h-9 rounded-lg bg-green-100 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
              </div>
              <div>
                <h4 class="text-stone-900 text-xs font-bold uppercase tracking-wider mb-1">Built to last</h4>
                <p class="text-stone-500 text-xs leading-relaxed">Weather-resistant materials rated for years of outdoor use</p>
              </div>
            </div>

          </div>

          <RouterLink
            to="/contact"
            class="inline-flex items-center gap-2.5 bg-green-600 hover:bg-green-500 text-white font-semibold px-7 py-3 rounded-full text-sm transition-all duration-200 hover:gap-3.5"
          >
            Get a Quote
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </RouterLink>
        </div>

        <!-- RIGHT: Auto-playing 3D-letters slideshow — drop photos in src/assets/letters/ -->
        <div class="relative">
          <div
            class="relative rounded-3xl overflow-hidden bg-stone-200 border border-stone-300"
            style="aspect-ratio: 4/3;"
          >
            <Slideshow :interval="1500" />
          </div>
        </div>

      </div>
    </section>


    <!-- ═══════════════════════════════════════════════════ -->
    <!-- WHATSAPP CTA                                        -->
    <!-- ═══════════════════════════════════════════════════ -->
    <section class="bg-gray-950 py-20 px-4 relative overflow-hidden">
      <div
        class="absolute inset-0 pointer-events-none"
        style="background: radial-gradient(ellipse 60% 80% at 50% 50%, rgba(22,163,74,0.07) 0%, transparent 70%);"
      />
      <div class="relative z-10 max-w-xl mx-auto text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4 leading-tight">
          Got a project in mind?<br>
          <span class="text-green-400">Let's talk.</span>
        </h2>
        <p class="text-gray-500 text-base mb-10 max-w-sm mx-auto leading-relaxed">
          Tell PrintOn what you need — we'll take it straight to WhatsApp and get back to you with a quote.
        </p>
        <a
          :href="waLink"
          target="_blank"
          rel="noopener noreferrer"
          class="inline-flex items-center gap-2.5 bg-[#25D366] hover:bg-[#1eb85a] text-white font-semibold px-8 py-3.5 rounded-full transition-all duration-200"
        >
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
          </svg>
          Start a conversation
        </a>
      </div>
    </section>


    <!-- ═══════════════════════════════════════════════════ -->
    <!-- OUR CLIENTS                                         -->
    <!-- ═══════════════════════════════════════════════════ -->
    <section class="bg-white py-20 px-4 border-t border-gray-100">
      <div class="max-w-6xl mx-auto">

        <div class="text-center mb-16">
          <p class="text-green-500 text-xs font-semibold uppercase tracking-widest mb-3">
            Trusted By
          </p>
          <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
            Brands we've worked with
          </h2>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-6 lg:gap-8">

          <div class="flex items-center justify-center w-56 h-36 border border-gray-100 hover:border-green-200 hover:shadow-xl hover:shadow-green-50/70 rounded-2xl p-6 transition-all duration-300 hover:scale-105 bg-white cursor-default">
            <img src="/logo/logo_MD.svg" alt="MD Marketing" class="max-h-full max-w-full object-contain" />
          </div>

          <div class="flex items-center justify-center w-56 h-36 border border-gray-100 hover:border-green-200 hover:shadow-xl hover:shadow-green-50/70 rounded-2xl p-6 transition-all duration-300 hover:scale-105 bg-white cursor-default">
            <img src="/logo/logo_Resa.svg" alt="Resa" class="max-h-full max-w-full object-contain" />
          </div>

          <div class="flex items-center justify-center w-56 h-36 border border-gray-100 hover:border-green-200 hover:shadow-xl hover:shadow-green-50/70 rounded-2xl p-6 transition-all duration-300 hover:scale-105 bg-white cursor-default">
            <img src="/logo/logo_frutza.svg" alt="Frutza" class="max-h-full max-w-full object-contain" />
          </div>

          <div class="flex items-center justify-center w-56 h-36 border border-gray-100 hover:border-green-200 hover:shadow-xl hover:shadow-green-50/70 rounded-2xl p-6 transition-all duration-300 hover:scale-105 bg-white cursor-default">
            <img src="/logo/qendra_piramida.svg" alt="Qendra Piramida" class="max-h-full max-w-full object-contain" />
          </div>

        </div>

      </div>
    </section>

  </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import Slideshow from '@/Components/Slideshow.vue';

// ── WhatsApp link ──────────────────────────────────────
const waLink = 'https://wa.me/355698992158?text=' + encodeURIComponent('Hello PrintOn! ');

// ── Scroll helper ──────────────────────────────────────
function scrollTo(id) {
  document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' });
}
</script>
