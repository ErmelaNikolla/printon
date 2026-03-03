<template>
  <AdminLayout>
    <template #title>Dashboard</template>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <StatCard title="Total Posts" :value="stats.posts" color="blue" icon="image" />
      <StatCard title="Published" :value="stats.published" color="green" icon="check" />
      <StatCard title="Total Orders" :value="stats.orders" color="purple" icon="clipboard" />
      <StatCard title="Pending Orders" :value="stats.pending_orders" color="yellow" icon="clock" />
    </div>

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-white rounded-xl p-6 shadow-sm">
        <h2 class="font-semibold text-gray-800 mb-4">Quick Actions</h2>
        <div class="space-y-3">
          <Link
            :href="route('admin.posts.create')"
            class="flex items-center gap-3 px-4 py-3 bg-red-50 hover:bg-red-100 rounded-lg text-red-700 font-medium transition-colors"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create New Post
          </Link>
          <Link
            :href="route('admin.orders.index')"
            class="flex items-center gap-3 px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg text-gray-700 font-medium transition-colors"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            View Orders
          </Link>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
  stats: Object,
});

// Inline stat card component
const StatCard = {
  props: ['title', 'value', 'color', 'icon'],
  template: `
    <div class="bg-white rounded-xl p-6 shadow-sm">
      <p class="text-sm text-gray-500 mb-1">{{ title }}</p>
      <p class="text-3xl font-bold text-gray-800">{{ value }}</p>
    </div>
  `,
};
</script>
