<template>
  <PublicLayout>
    <section class="max-w-2xl mx-auto px-4 py-16">
      <!-- Success message -->
      <div
        v-if="flash?.success"
        class="mb-6 bg-green-50 border border-green-200 text-green-800 px-5 py-4 rounded-xl text-center"
      >
        {{ t('order_success') }}
      </div>

      <div class="bg-white rounded-2xl shadow-sm p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ t('order_title') }}</h1>

        <form @submit.prevent="submit" class="space-y-5">
          <!-- Name -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
              {{ t('order_name') }} <span class="text-green-500">*</span>
            </label>
            <input
              v-model="form.name"
              type="text"
              required
              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
            />
            <p v-if="form.errors.name" class="text-green-500 text-sm mt-1">{{ form.errors.name }}</p>
          </div>

          <!-- Phone -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">{{ t('order_phone') }}</label>
            <input
              v-model="form.phone"
              type="tel"
              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
            />
          </div>

          <!-- Email -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">{{ t('order_email') }}</label>
            <input
              v-model="form.email"
              type="email"
              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
            />
            <p v-if="form.errors.email" class="text-green-500 text-sm mt-1">{{ form.errors.email }}</p>
          </div>

          <!-- Preferred date -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">{{ t('order_preferred_date') }}</label>
            <input
              v-model="form.preferred_date"
              type="datetime-local"
              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
            />
          </div>

          <!-- Message -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">{{ t('order_message') }}</label>
            <textarea
              v-model="form.message"
              rows="5"
              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none"
            />
          </div>

          <button
            type="submit"
            :disabled="form.processing"
            class="w-full bg-green-600 hover:bg-green-700 disabled:opacity-50 text-white font-semibold py-3 rounded-lg transition-colors"
          >
            {{ form.processing ? '...' : t('order_submit') }}
          </button>
        </form>
      </div>
    </section>
  </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const flash = computed(() => page.props.flash);
const locale = computed(() => page.props.locale);
const translations = computed(() => page.props.translations || {});

function t(key) {
  return translations.value[key] || key;
}

const form = useForm({
  name: '',
  phone: '',
  email: '',
  preferred_date: '',
  message: '',
});

function submit() {
  form.post(route('orders.store'));
}
</script>
