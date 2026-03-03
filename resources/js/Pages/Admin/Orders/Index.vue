<template>
  <AdminLayout>
    <template #title>Orders &amp; Inquiries</template>

    <!-- Filter tabs -->
    <div class="flex items-center gap-2 mb-6">
      <button
        v-for="tab in tabs"
        :key="tab.value"
        @click="activeTab = tab.value"
        class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors"
        :class="activeTab === tab.value
          ? 'bg-gray-900 text-white'
          : 'bg-white text-gray-500 hover:text-gray-800 border border-gray-200'"
      >
        {{ tab.label }}
        <span class="ml-1 text-xs opacity-60">{{ tab.count }}</span>
      </button>
    </div>

    <!-- Empty state -->
    <div v-if="filtered.length === 0" class="text-center py-20 text-gray-400 bg-white rounded-2xl border border-gray-100">
      No entries yet.
    </div>

    <!-- Cards grid -->
    <div v-else class="grid grid-cols-1 lg:grid-cols-2 gap-4">
      <div
        v-for="order in filtered"
        :key="order.id"
        class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-md transition-shadow"
      >

        <!-- Card header -->
        <div class="flex items-center justify-between px-5 py-3 border-b border-gray-50">
          <div class="flex items-center gap-2">
            <!-- Chat badge -->
            <span
              v-if="isChat(order)"
              class="inline-flex items-center gap-1 bg-green-50 text-green-700 text-xs font-semibold px-2.5 py-0.5 rounded-full"
            >
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
              </svg>
              Rei Chat
            </span>
            <!-- Form badge -->
            <span
              v-else
              class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 text-xs font-semibold px-2.5 py-0.5 rounded-full"
            >
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
              Form
            </span>
            <span class="text-gray-300 text-xs">#{{ order.id }}</span>
          </div>
          <span class="text-gray-400 text-xs">{{ timeAgo(order.created_at) }}</span>
        </div>

        <!-- Card body -->
        <div class="px-5 py-4 space-y-2.5">

          <!-- Name (form orders only) -->
          <div v-if="!isChat(order)" class="flex items-center gap-2.5">
            <svg class="w-4 h-4 text-gray-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <span class="text-gray-800 font-medium text-sm">{{ order.name }}</span>
          </div>

          <!-- Email -->
          <div v-if="order.email" class="flex items-center gap-2.5">
            <svg class="w-4 h-4 text-gray-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <a :href="`mailto:${order.email}`" class="text-blue-600 hover:underline text-sm">{{ order.email }}</a>
          </div>

          <!-- Phone -->
          <div v-if="order.phone" class="flex items-center gap-2.5">
            <svg class="w-4 h-4 text-gray-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            <a :href="`tel:${order.phone}`" class="text-gray-700 hover:text-gray-900 text-sm transition-colors">{{ order.phone }}</a>
          </div>

          <!-- Preferred date -->
          <div v-if="order.preferred_date" class="flex items-center gap-2.5">
            <svg class="w-4 h-4 text-gray-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span class="text-gray-600 text-sm">{{ formatDate(order.preferred_date) }}</span>
          </div>

          <!-- Message -->
          <div v-if="order.message" class="pt-1">
            <!-- Chat-style bubble for Rei chat -->
            <div
              v-if="isChat(order)"
              class="bg-gray-50 rounded-xl rounded-tl-sm border border-gray-100 px-4 py-3 text-sm text-gray-700 leading-relaxed"
            >
              "{{ order.message }}"
            </div>
            <!-- Plain text for form -->
            <p v-else class="text-gray-600 text-sm leading-relaxed border-l-2 border-gray-200 pl-3">
              {{ order.message }}
            </p>
          </div>

        </div>

        <!-- Card footer -->
        <div class="px-5 py-3 bg-gray-50/60 border-t border-gray-50 flex items-center justify-between">
          <select
            :value="order.status"
            @change="updateStatus(order.id, $event.target.value)"
            :class="statusClass(order.status)"
            class="text-xs font-semibold px-3 py-1.5 rounded-full border-0 outline-none cursor-pointer appearance-none"
          >
            <option value="pending">Pending</option>
            <option value="confirmed">Processing</option>
            <option value="done">Complete</option>
          </select>
          <Link
            :href="route('admin.orders.show', order.id)"
            class="text-xs text-gray-400 hover:text-gray-700 transition-colors flex items-center gap-1"
          >
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
            </svg>
            Edit
          </Link>
        </div>

      </div>
    </div>

  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
  orders: Array,
});

// ── Tabs ───────────────────────────────────────────────
const activeTab = ref('all');

const tabs = computed(() => [
  { label: 'All',      value: 'all',  count: props.orders.length },
  { label: 'Rei Chat', value: 'chat', count: props.orders.filter(isChat).length },
  { label: 'Form',     value: 'form', count: props.orders.filter(o => !isChat(o)).length },
]);

const filtered = computed(() => {
  if (activeTab.value === 'chat') return props.orders.filter(isChat);
  if (activeTab.value === 'form') return props.orders.filter(o => !isChat(o));
  return props.orders;
});

// ── Helpers ────────────────────────────────────────────
function isChat(order) {
  return order.name === 'Quick Inquiry';
}

function updateStatus(id, status) {
  router.put(route('admin.orders.update', id), { status }, { preserveScroll: true });
}

function statusClass(status) {
  return {
    pending:   'bg-amber-100 text-amber-700',
    confirmed: 'bg-blue-100 text-blue-700',
    done:      'bg-green-100 text-green-700',
  }[status] ?? 'bg-gray-100 text-gray-700';
}

function formatDate(dateStr) {
  if (!dateStr) return '—';
  return new Date(dateStr).toLocaleString();
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
