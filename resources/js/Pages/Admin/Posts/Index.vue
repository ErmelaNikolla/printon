<template>
  <AdminLayout>
    <template #title>Posts</template>
    <template #header-actions>
      <Link
        :href="route('admin.posts.create')"
        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors"
      >
        + New Post
      </Link>
    </template>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
      <div v-if="posts.length === 0" class="text-center py-16 text-gray-400">
        No posts yet. <Link :href="route('admin.posts.create')" class="text-red-600 underline">Create one</Link>.
      </div>

      <table v-else class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
          <tr>
            <th class="px-4 py-3 text-left">Preview</th>
            <th class="px-4 py-3 text-left">Title</th>
            <th class="px-4 py-3 text-left">Type</th>
            <th class="px-4 py-3 text-left">Status</th>
            <th class="px-4 py-3 text-left">Order</th>
            <th class="px-4 py-3 text-left">Date</th>
            <th class="px-4 py-3 text-left">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <tr v-for="post in posts" :key="post.id" class="hover:bg-gray-50">
            <!-- Preview -->
            <td class="px-4 py-3">
              <img
                v-if="post.image_url"
                :src="post.image_url"
                class="w-14 h-14 object-cover rounded-lg"
                alt=""
              />
              <div v-else-if="post.type === 'video_upload'" class="w-14 h-14 bg-gray-200 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8 5v14l11-7z"/>
                </svg>
              </div>
              <div v-else class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
              </div>
            </td>

            <!-- Title -->
            <td class="px-4 py-3 font-medium text-gray-800">
              {{ post.title['en'] || post.title['sq'] || post.title['fr'] || '—' }}
            </td>

            <!-- Type -->
            <td class="px-4 py-3">
              <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-700 capitalize">
                {{ post.type.replace('_', ' ') }}
              </span>
            </td>

            <!-- Status -->
            <td class="px-4 py-3">
              <span
                :class="post.is_published
                  ? 'bg-green-100 text-green-700'
                  : 'bg-yellow-100 text-yellow-700'"
                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium"
              >
                {{ post.is_published ? 'Published' : 'Draft' }}
              </span>
            </td>

            <!-- Order -->
            <td class="px-4 py-3 text-gray-500">{{ post.order_column }}</td>

            <!-- Date -->
            <td class="px-4 py-3 text-gray-400">{{ post.created_at }}</td>

            <!-- Actions -->
            <td class="px-4 py-3">
              <div class="flex items-center gap-2">
                <Link
                  :href="route('admin.posts.edit', post.id)"
                  class="text-blue-600 hover:text-blue-800 text-xs font-medium"
                >
                  Edit
                </Link>
                <button
                  @click="confirmDelete(post.id)"
                  class="text-red-600 hover:text-red-800 text-xs font-medium"
                >
                  Delete
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Delete confirm modal -->
    <div v-if="deleteTarget" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
      <div class="bg-white rounded-xl p-6 max-w-sm w-full mx-4 shadow-xl">
        <h3 class="font-semibold text-gray-800 mb-2">Delete Post?</h3>
        <p class="text-gray-500 text-sm mb-5">This action cannot be undone.</p>
        <div class="flex gap-3">
          <button
            @click="deleteTarget = null"
            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 text-sm hover:bg-gray-50"
          >
            Cancel
          </button>
          <Link
            :href="route('admin.posts.destroy', deleteTarget)"
            method="delete"
            as="button"
            class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700 text-center"
          >
            Delete
          </Link>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
  posts: Array,
});

const deleteTarget = ref(null);

function confirmDelete(id) {
  deleteTarget.value = id;
}
</script>
