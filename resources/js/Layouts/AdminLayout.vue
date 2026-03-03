<template>
  <div class="min-h-screen flex bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col">
      <div class="px-6 py-5 border-b border-gray-700">
        <span class="text-xl font-bold text-red-500">Printon</span>
        <span class="block text-xs text-gray-400 mt-0.5">Admin Panel</span>
      </div>

      <nav class="flex-1 px-4 py-6 space-y-1">
        <Link
          :href="route('admin.dashboard')"
          class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors"
          :class="isActive('admin.dashboard') ? 'bg-red-600 text-white' : 'text-gray-300 hover:bg-gray-700'"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 7h18M3 12h18M3 17h18" />
          </svg>
          Dashboard
        </Link>

        <Link
          :href="route('admin.posts.index')"
          class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors"
          :class="isActive('admin.posts') ? 'bg-red-600 text-white' : 'text-gray-300 hover:bg-gray-700'"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          Posts
        </Link>

        <Link
          :href="route('admin.orders.index')"
          class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors"
          :class="isActive('admin.orders') ? 'bg-red-600 text-white' : 'text-gray-300 hover:bg-gray-700'"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
          Orders
        </Link>
      </nav>

      <!-- User / Logout -->
      <div class="px-4 py-4 border-t border-gray-700">
        <div class="flex items-center gap-3 mb-3">
          <div class="w-8 h-8 rounded-full bg-red-500 flex items-center justify-center text-sm font-bold">
            {{ authUser?.name?.[0]?.toUpperCase() }}
          </div>
          <span class="text-sm text-gray-300 truncate">{{ authUser?.name }}</span>
        </div>
        <Link
          :href="route('admin.logout')"
          method="post"
          as="button"
          class="w-full text-left text-sm text-gray-400 hover:text-white transition-colors px-3 py-1.5 rounded hover:bg-gray-700"
        >
          Logout
        </Link>
      </div>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Top bar -->
      <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-gray-800">
          <slot name="title">Dashboard</slot>
        </h1>
        <slot name="header-actions" />
      </header>

      <!-- Content -->
      <main class="flex-1 overflow-auto p-6">
        <!-- Flash messages -->
        <div v-if="flash?.success" class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
          {{ flash.success }}
        </div>
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const authUser = computed(() => page.props.auth?.user);
const flash = computed(() => page.props.flash);

function isActive(routeName) {
  return route().current(routeName + '*');
}
</script>
