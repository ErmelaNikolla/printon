<template>
  <AdminLayout>
    <template #title>Edit Post</template>

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

        <!-- Current media preview -->
        <div v-if="post.image_url && form.type === 'image'" class="space-y-2">
          <label class="block text-sm font-medium text-gray-700">Current Image</label>
          <img :src="post.image_url" class="max-h-48 rounded-lg" />
        </div>
        <div v-if="post.video_file_url && form.type === 'video_upload'" class="space-y-2">
          <label class="block text-sm font-medium text-gray-700">Current Video</label>
          <video :src="post.video_file_url" controls class="max-h-48 rounded-lg" />
        </div>

        <!-- Image upload -->
        <div v-if="form.type === 'image'">
          <label class="block text-sm font-medium text-gray-700 mb-2">Replace Image (optional)</label>
          <div
            class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-red-400 transition-colors cursor-pointer"
            @click="$refs.imageInput.click()"
          >
            <img v-if="imagePreview" :src="imagePreview" class="max-h-40 mx-auto rounded-lg mb-2" />
            <p class="text-gray-500 text-sm">Click to select a new image</p>
          </div>
          <input ref="imageInput" type="file" accept="image/*" class="hidden" @change="onImageChange" />
        </div>

        <!-- Video upload -->
        <div v-if="form.type === 'video_upload'">
          <label class="block text-sm font-medium text-gray-700 mb-2">Replace Video (optional)</label>
          <div
            class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-red-400 transition-colors cursor-pointer"
            @click="$refs.videoInput.click()"
          >
            <video v-if="videoPreview" :src="videoPreview" controls class="max-h-40 mx-auto rounded-lg mb-2" />
            <p class="text-gray-500 text-sm">Click to select a new video</p>
          </div>
          <input ref="videoInput" type="file" accept="video/*" class="hidden" @change="onVideoChange" />
        </div>

        <!-- Video link -->
        <div v-if="form.type === 'video_link'">
          <label class="block text-sm font-medium text-gray-700 mb-2">Video URL</label>
          <input
            v-model="form.video_url"
            type="url"
            placeholder="https://www.youtube.com/watch?v=..."
            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500"
          />
          <p v-if="form.errors.video_url" class="text-red-500 text-sm mt-1">{{ form.errors.video_url }}</p>
        </div>

        <!-- Title -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
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

        <!-- Description -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
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

        <!-- Order column -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
          <input
            v-model.number="form.order_column"
            type="number"
            min="0"
            class="w-32 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500"
          />
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
          <label class="text-sm font-medium text-gray-700">
            {{ form.is_published ? 'Published' : 'Draft' }}
          </label>
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
            {{ form.processing ? 'Saving...' : 'Save Changes' }}
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

const props = defineProps({
  post: Object,
});

const typeOptions = [
  { value: 'image', label: 'Image' },
  { value: 'video_upload', label: 'Video Upload' },
  { value: 'video_link', label: 'Video Link' },
];

const imagePreview = ref(null);
const videoPreview = ref(null);

const form = useForm({
  type: props.post.type,
  title: { sq: props.post.title?.sq || '', en: props.post.title?.en || '', fr: props.post.title?.fr || '' },
  description: { sq: props.post.description?.sq || '', en: props.post.description?.en || '', fr: props.post.description?.fr || '' },
  video_url: props.post.video_url || '',
  image: null,
  video_file: null,
  is_published: props.post.is_published,
  order_column: props.post.order_column,
  _method: 'PUT',
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
  form.post(route('admin.posts.update', props.post.id), {
    forceFormData: true,
  });
}
</script>
