<template>
  <AdminLayout>
    <template #title>Create Post</template>

    <div class="max-w-3xl bg-white rounded-xl shadow-sm p-8">
      <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-6">

        <!-- Post type selector -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Post Type</label>
          <div class="flex gap-3">
            <button
              v-for="option in typeOptions"
              :key="option.value"
              type="button"
              @click="form.type = option.value"
              :class="form.type === option.value
                ? 'bg-red-600 text-white border-red-600'
                : 'bg-white text-gray-700 border-gray-300 hover:border-gray-400'"
              class="flex-1 py-2.5 px-4 rounded-lg border font-medium text-sm transition-colors"
            >
              {{ option.label }}
            </button>
          </div>
        </div>

        <!-- Image upload -->
        <div v-if="form.type === 'image'">
          <label class="block text-sm font-medium text-gray-700 mb-2">Image *</label>
          <div
            class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-red-400 transition-colors cursor-pointer"
            @click="$refs.imageInput.click()"
          >
            <img v-if="imagePreview" :src="imagePreview" class="max-h-48 mx-auto rounded-lg mb-3" />
            <div v-else>
              <svg class="w-10 h-10 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <p class="text-gray-500 text-sm">Click to select an image</p>
              <p class="text-gray-400 text-xs mt-1">JPG, PNG, GIF, WebP — max 10MB</p>
            </div>
          </div>
          <input
            ref="imageInput"
            type="file"
            accept="image/*"
            class="hidden"
            @change="onImageChange"
          />
          <p v-if="form.errors.image" class="text-red-500 text-sm mt-1">{{ form.errors.image }}</p>
        </div>

        <!-- Video upload -->
        <div v-if="form.type === 'video_upload'">
          <label class="block text-sm font-medium text-gray-700 mb-2">Video File *</label>
          <div
            class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-red-400 transition-colors cursor-pointer"
            @click="$refs.videoInput.click()"
          >
            <video v-if="videoPreview" :src="videoPreview" controls class="max-h-48 mx-auto rounded-lg mb-3" />
            <div v-else>
              <svg class="w-10 h-10 mx-auto text-gray-400 mb-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"/>
              </svg>
              <p class="text-gray-500 text-sm">Click to select a video</p>
              <p class="text-gray-400 text-xs mt-1">MP4, MOV, AVI, WebM — max 100MB</p>
            </div>
          </div>
          <input
            ref="videoInput"
            type="file"
            accept="video/*"
            class="hidden"
            @change="onVideoChange"
          />
          <p v-if="form.errors.video_file" class="text-red-500 text-sm mt-1">{{ form.errors.video_file }}</p>
        </div>

        <!-- Video link -->
        <div v-if="form.type === 'video_link'">
          <label class="block text-sm font-medium text-gray-700 mb-2">Video URL *</label>
          <input
            v-model="form.video_url"
            type="url"
            placeholder="https://www.youtube.com/watch?v=..."
            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500"
          />
          <p v-if="form.errors.video_url" class="text-red-500 text-sm mt-1">{{ form.errors.video_url }}</p>
        </div>

        <!-- Translatable title -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Title (optional)</label>
          <div class="space-y-2">
            <div v-for="lang in ['sq', 'en', 'fr']" :key="lang" class="flex gap-2 items-center">
              <span class="w-8 text-xs font-bold text-gray-400 uppercase">{{ lang }}</span>
              <input
                v-model="form.title[lang]"
                type="text"
                :placeholder="`Title in ${lang}`"
                class="flex-1 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500"
              />
            </div>
          </div>
        </div>

        <!-- Translatable description -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Description (optional)</label>
          <div class="space-y-2">
            <div v-for="lang in ['sq', 'en', 'fr']" :key="lang" class="flex gap-2 items-start">
              <span class="w-8 text-xs font-bold text-gray-400 uppercase mt-2">{{ lang }}</span>
              <textarea
                v-model="form.description[lang]"
                :placeholder="`Description in ${lang}`"
                rows="2"
                class="flex-1 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"
              />
            </div>
          </div>
        </div>

        <!-- Published toggle -->
        <div class="flex items-center gap-3">
          <button
            type="button"
            @click="form.is_published = !form.is_published"
            :class="form.is_published ? 'bg-green-500' : 'bg-gray-300'"
            class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors"
          >
            <span
              :class="form.is_published ? 'translate-x-6' : 'translate-x-1'"
              class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform"
            />
          </button>
          <label class="text-sm font-medium text-gray-700">Publish immediately</label>
        </div>

        <!-- Actions -->
        <div class="flex gap-3 pt-2">
          <Link
            :href="route('admin.posts.index')"
            class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium text-sm"
          >
            Cancel
          </Link>
          <button
            type="submit"
            :disabled="form.processing"
            class="px-6 py-2.5 bg-red-600 hover:bg-red-700 disabled:opacity-50 text-white font-medium text-sm rounded-lg transition-colors"
          >
            {{ form.processing ? 'Saving...' : 'Create Post' }}
          </button>
        </div>
      </form>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const typeOptions = [
  { value: 'image', label: 'Image' },
  { value: 'video_upload', label: 'Video Upload' },
  { value: 'video_link', label: 'Video Link' },
];

const imagePreview = ref(null);
const videoPreview = ref(null);

const form = useForm({
  type: 'image',
  title: { sq: '', en: '', fr: '' },
  description: { sq: '', en: '', fr: '' },
  video_url: '',
  image: null,
  video_file: null,
  is_published: false,
});

function onImageChange(e) {
  const file = e.target.files[0];
  if (!file) return;
  form.image = file;
  imagePreview.value = URL.createObjectURL(file);
}

function onVideoChange(e) {
  const file = e.target.files[0];
  if (!file) return;
  form.video_file = file;
  videoPreview.value = URL.createObjectURL(file);
}

function submit() {
  form.post(route('admin.posts.store'), {
    forceFormData: true,
  });
}
</script>
