<template>
  <div class="relative w-full h-full overflow-hidden select-none">

    <!-- Slideshow -->
    <template v-if="slides.length">
      <Transition name="fade">
        <img
          :key="current"
          :src="slides[current]"
          alt=""
          draggable="false"
          class="absolute inset-0 w-full h-full object-cover pointer-events-none"
        />
      </Transition>
    </template>

    <!-- Fallback when no images have been added yet -->
    <div
      v-else
      class="absolute inset-0 flex flex-col items-center justify-center text-center px-8 bg-stone-200"
    >
      <div class="text-[8rem] font-black leading-none tracking-tighter select-none" style="color: rgba(0,0,0,0.05);">3D</div>
      <p class="text-stone-400 text-xs font-semibold uppercase tracking-widest -mt-2">Gërma 3D</p>
    </div>

  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const props = defineProps({
  // milliseconds each photo stays on screen
  interval: { type: Number, default: 1500 },
});

// Auto-load every image dropped into src/assets/letters/.
// Filename order controls display order — name them 01, 02, 03, …
const modules = import.meta.glob(
  '../assets/letters/*.{jpg,jpeg,png,webp,avif,JPG,JPEG,PNG,WEBP,AVIF}',
  { eager: true, import: 'default' }
);
const slides = Object.keys(modules).sort().map((key) => modules[key]);

const current = ref(0);
let timer = null;

onMounted(() => {
  // No manual navigation — purely automatic, looping.
  if (slides.length > 1) {
    timer = setInterval(() => {
      current.value = (current.value + 1) % slides.length;
    }, props.interval);
  }
});

onUnmounted(() => {
  if (timer) clearInterval(timer);
});
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
