<template>
  <div class="min-h-screen bg-gray-900 flex items-center justify-center px-4">
    <div class="w-full max-w-sm">
      <div class="text-center mb-8">
        <span class="text-3xl font-bold text-red-500">Printon</span>
        <p class="text-gray-400 text-sm mt-1">Admin Panel</p>
      </div>

      <form @submit.prevent="submit" class="bg-white rounded-2xl shadow-xl p-8 space-y-5">
        <h1 class="text-xl font-semibold text-gray-800 mb-2">Login</h1>

        <div v-if="form.errors.email" class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
          {{ form.errors.email }}
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input
            v-model="form.email"
            type="email"
            required
            autocomplete="email"
            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input
            v-model="form.password"
            type="password"
            required
            autocomplete="current-password"
            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
          />
        </div>

        <div class="flex items-center gap-2">
          <input v-model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300" />
          <label for="remember" class="text-sm text-gray-600">Remember me</label>
        </div>

        <button
          type="submit"
          :disabled="form.processing"
          class="w-full bg-red-600 hover:bg-red-700 disabled:opacity-50 text-white font-semibold py-3 rounded-lg transition-colors"
        >
          {{ form.processing ? 'Logging in...' : 'Login' }}
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

function submit() {
  form.post(route('admin.login.post'), {
    onFinish: () => form.reset('password'),
  });
}
</script>
