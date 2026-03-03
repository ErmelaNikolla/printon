<template>
  <AdminLayout>
    <template #title>
      Order #{{ order.id }}
      <span class="ml-2 text-sm font-normal text-gray-400">{{ isChat ? 'Rei Chat' : 'Form Submission' }}</span>
    </template>

    <template #header-actions>
      <Link
        :href="route('admin.orders.index')"
        class="text-sm text-gray-500 hover:text-gray-800 transition-colors flex items-center gap-1.5"
      >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Orders
      </Link>
    </template>

    <div class="max-w-2xl">
      <form @submit.prevent="submit" class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 space-y-4">

          <!-- Name -->
          <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Name</label>
            <input
              v-model="form.name"
              type="text"
              class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
              :class="{ 'border-red-300': form.errors.name }"
              placeholder="Customer name"
            />
            <p v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</p>
          </div>

          <!-- Email -->
          <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Email</label>
            <input
              v-model="form.email"
              type="email"
              class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
              :class="{ 'border-red-300': form.errors.email }"
              placeholder="customer@email.com"
            />
            <p v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</p>
          </div>

          <!-- Phone -->
          <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Phone</label>
            <input
              v-model="form.phone"
              type="text"
              class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
              placeholder="+355..."
            />
          </div>

          <!-- Preferred Date -->
          <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Preferred Date</label>
            <input
              v-model="form.preferred_date"
              type="datetime-local"
              class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
            />
          </div>

          <!-- Message -->
          <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Message</label>
            <textarea
              v-model="form.message"
              rows="4"
              class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent resize-none"
              placeholder="Customer's message or order details..."
            />
          </div>

          <!-- Status -->
          <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Status</label>
            <select
              v-model="form.status"
              class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
            >
              <option value="pending">Pending</option>
              <option value="confirmed">Processing</option>
              <option value="done">Complete</option>
            </select>
          </div>

        </div>

        <!-- Footer -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
          <span class="text-xs text-gray-400">Created {{ timeAgo(order.created_at) }}</span>
          <button
            type="submit"
            :disabled="form.processing || !form.isDirty"
            class="px-5 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition-colors disabled:opacity-40 disabled:cursor-not-allowed"
          >
            {{ form.processing ? 'Saving...' : 'Save Changes' }}
          </button>
        </div>
      </form>
      <!-- Attachments -->
      <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden mt-4">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
          <h2 class="text-sm font-semibold text-gray-700">Attachments</h2>
          <span class="text-xs text-gray-400">{{ media.length }} file{{ media.length !== 1 ? 's' : '' }}</span>
        </div>

        <div class="px-6 py-4">
          <!-- File grid -->
          <div v-if="media.length" class="grid grid-cols-3 sm:grid-cols-4 gap-3 mb-4">
            <div v-for="file in media" :key="file.id" class="relative group">
              <!-- Image thumbnail -->
              <a
                v-if="isImage(file)"
                :href="file.url"
                target="_blank"
                class="block aspect-square rounded-lg overflow-hidden bg-gray-100 border border-gray-200 hover:opacity-90 transition-opacity"
              >
                <img :src="file.url" :alt="file.name" class="w-full h-full object-cover" />
              </a>
              <!-- File icon -->
              <a
                v-else
                :href="file.url"
                target="_blank"
                class="aspect-square rounded-lg bg-gray-50 border border-gray-200 flex flex-col items-center justify-center gap-1 px-2 hover:bg-gray-100 transition-colors block"
              >
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
                <span class="text-xs text-gray-500 text-center truncate w-full leading-tight">{{ file.name }}</span>
              </a>
              <!-- Size label -->
              <span class="block text-xs text-gray-400 text-center mt-1 truncate">{{ file.size }}</span>
              <!-- Delete button -->
              <button
                @click="deleteMedia(file.id)"
                class="absolute -top-1.5 -right-1.5 w-5 h-5 bg-red-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600"
                title="Remove"
              >
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
              </button>
            </div>
          </div>

          <p v-else class="text-sm text-gray-400 mb-4">No files attached yet.</p>

          <!-- Upload button -->
          <input ref="fileInput" type="file" multiple class="hidden" @change="uploadFiles" />
          <button
            @click="fileInput.click()"
            :disabled="uploading"
            class="inline-flex items-center gap-2 px-4 py-2 border border-gray-200 text-sm text-gray-600 rounded-lg hover:bg-gray-50 transition-colors disabled:opacity-50"
          >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
            </svg>
            {{ uploading ? 'Uploading...' : 'Upload Files' }}
          </button>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const props = defineProps({
  order: Object,
  media: Array,
});

const isChat = computed(() => props.order.name === 'Quick Inquiry');

function toDatetimeLocal(dateStr) {
  if (!dateStr) return '';
  const d = new Date(dateStr);
  const p = n => String(n).padStart(2, '0');
  return `${d.getFullYear()}-${p(d.getMonth() + 1)}-${p(d.getDate())}T${p(d.getHours())}:${p(d.getMinutes())}`;
}

const form = useForm({
  name:           props.order.name,
  email:          props.order.email ?? '',
  phone:          props.order.phone ?? '',
  preferred_date: toDatetimeLocal(props.order.preferred_date),
  message:        props.order.message ?? '',
  status:         props.order.status,
});

function submit() {
  form.put(route('admin.orders.update', props.order.id));
}

// ── Media ──────────────────────────────────────────────
const fileInput = ref(null);
const uploading = ref(false);

function isImage(file) {
  return file.mime.startsWith('image/');
}

function uploadFiles(event) {
  const files = event.target.files;
  if (!files.length) return;
  uploading.value = true;
  const data = new FormData();
  for (const file of files) data.append('files[]', file);
  router.post(route('admin.orders.media.store', props.order.id), data, {
    forceFormData: true,
    preserveScroll: true,
    onFinish: () => {
      uploading.value = false;
      fileInput.value.value = '';
    },
  });
}

function deleteMedia(mediaId) {
  router.delete(route('admin.orders.media.destroy', { order: props.order.id, media: mediaId }), {
    preserveScroll: true,
  });
}

function timeAgo(dateStr) {
  if (!dateStr) return '';
  const diff  = Date.now() - new Date(dateStr).getTime();
  const mins  = Math.floor(diff / 60000);
  const hours = Math.floor(diff / 3600000);
  const days  = Math.floor(diff / 86400000);
  if (mins < 1)   return 'just now';
  if (mins < 60)  return `${mins}m ago`;
  if (hours < 24) return `${hours}h ago`;
  return `${days}d ago`;
}
</script>
