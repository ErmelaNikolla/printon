<template>
  <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3">

    <!-- ── Chat panel ──────────────────────────────────── -->
    <Transition
      enter-active-class="transition-all duration-300 ease-out"
      enter-from-class="opacity-0 translate-y-4 scale-95"
      enter-to-class="opacity-100 translate-y-0 scale-100"
      leave-active-class="transition-all duration-200 ease-in"
      leave-from-class="opacity-100 translate-y-0 scale-100"
      leave-to-class="opacity-0 translate-y-4 scale-95"
    >
      <div
        v-if="isOpen"
        class="w-[340px] bg-white rounded-2xl shadow-2xl flex flex-col overflow-hidden border border-gray-100"
        style="max-height: 500px;"
      >

        <!-- Header -->
        <div class="bg-gray-950 px-4 py-3 flex items-center gap-3 shrink-0">
          <div class="w-9 h-9 rounded-full bg-green-600 flex items-center justify-center shrink-0">
            <span class="text-white text-sm font-black select-none">R</span>
          </div>
          <div class="flex-1 min-w-0">
            <div class="text-white font-semibold text-sm">Rei</div>
            <div class="text-green-400/60 text-xs">PrintOn · replies instantly</div>
          </div>
          <button
            @click="isOpen = false"
            class="text-gray-500 hover:text-white transition-colors p-1 rounded"
            aria-label="Close"
          >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <!-- Messages area -->
        <div
          ref="messagesEl"
          class="flex-1 overflow-y-auto p-4 space-y-3"
          style="background: #f9fafb;"
        >
          <div v-for="msg in messages" :key="msg.id">

            <!-- Bot message -->
            <div v-if="msg.from === 'bot'" class="flex items-end gap-2">
              <div class="w-7 h-7 rounded-full bg-green-600 flex items-center justify-center shrink-0">
                <span class="text-white text-xs font-black select-none">R</span>
              </div>
              <div class="bg-white rounded-2xl rounded-bl-sm px-3.5 py-2.5 text-sm text-gray-800 shadow-sm max-w-[230px] leading-relaxed">
                {{ msg.text }}
              </div>
            </div>

            <!-- User message -->
            <div v-else class="flex justify-end">
              <div class="bg-gray-900 text-white rounded-2xl rounded-br-sm px-3.5 py-2.5 text-sm max-w-[230px] leading-relaxed">
                {{ msg.text }}
              </div>
            </div>

          </div>

          <!-- Typing indicator -->
          <div v-if="isTyping" class="flex items-end gap-2">
            <div class="w-7 h-7 rounded-full bg-green-600 flex items-center justify-center shrink-0">
              <span class="text-white text-xs font-black select-none">R</span>
            </div>
            <div class="bg-white rounded-2xl rounded-bl-sm px-4 py-3 shadow-sm">
              <div class="flex gap-1 items-center h-3">
                <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0ms"/>
                <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay:160ms"/>
                <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay:320ms"/>
              </div>
            </div>
          </div>
        </div>

        <!-- Input area -->
        <div v-if="step < 4" class="border-t border-gray-100 p-3 bg-white shrink-0">
          <div class="flex gap-2">
            <input
              ref="inputEl"
              v-model="inputValue"
              :type="step === 2 ? 'email' : step === 3 ? 'tel' : 'text'"
              :placeholder="inputPlaceholder"
              @keyup.enter="send"
              class="flex-1 bg-gray-50 border border-gray-200 rounded-full px-4 py-2 text-sm text-gray-800 placeholder-gray-300 outline-none focus:border-green-400 transition-colors"
            />
            <button
              @click="send"
              :disabled="!inputValue.trim() && step !== 3"
              class="w-9 h-9 bg-green-600 hover:bg-green-500 disabled:opacity-30 text-white rounded-full flex items-center justify-center shrink-0 transition-all"
            >
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
              </svg>
            </button>
          </div>
          <!-- Skip for phone step -->
          <button
            v-if="step === 3"
            @click="skipPhone"
            class="mt-1.5 text-xs text-gray-400 hover:text-gray-600 transition-colors pl-4"
          >
            Skip →
          </button>
        </div>

        <!-- Done footer -->
        <div v-else class="border-t border-gray-100 px-4 py-3 bg-white text-center text-xs text-gray-400 shrink-0">
          Rei will be in touch soon 💚
        </div>

      </div>
    </Transition>

    <!-- ── Floating toggle button ──────────────────────── -->
    <button
      @click="toggle"
      class="relative w-14 h-14 bg-gray-950 hover:bg-gray-800 text-white rounded-full shadow-xl flex items-center justify-center transition-all duration-200 hover:scale-105"
      :class="isOpen ? 'rotate-0' : ''"
      aria-label="Chat with Rei"
    >
      <!-- Notification dot (only when closed and never opened) -->
      <span
        v-if="!isOpen && !hasOpened"
        class="absolute -top-0.5 -right-0.5 w-3.5 h-3.5 bg-green-500 rounded-full border-2 border-white"
      />

      <!-- Chat icon -->
      <svg v-if="!isOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
      </svg>
      <!-- Close icon -->
      <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>

  </div>
</template>

<script setup>
import { ref, computed, nextTick, onMounted, onUnmounted } from 'vue';
import { route } from 'ziggy-js';

// ── State ──────────────────────────────────────────────
const isOpen    = ref(false);
const hasOpened = ref(false);
const step      = ref(0); // 0=idle 1=msg 2=email 3=phone 4=done
const messages  = ref([]);
const isTyping  = ref(false);
const inputValue = ref('');
const messagesEl = ref(null);
const inputEl    = ref(null);

const userData = { message: '', email: '', phone: '' };

// ── Computed placeholder ───────────────────────────────
const inputPlaceholder = computed(() => {
  if (step.value === 1) return 'Type your message...';
  if (step.value === 2) return 'your@email.com';
  if (step.value === 3) return '+355 69 ...';
  return '';
});

// ── Open / close ───────────────────────────────────────
function toggle() {
  isOpen.value = !isOpen.value;
  if (isOpen.value && !hasOpened.value) {
    hasOpened.value = true;
    startConversation();
  }
  if (isOpen.value) {
    nextTick(() => inputEl.value?.focus());
  }
}

// ── Conversation ───────────────────────────────────────
async function startConversation() {
  step.value = 1;
  await addBotMessage('Hi! 👋 How can we help you today?', 400);
}

async function addBotMessage(text, delay = 900) {
  isTyping.value = true;
  await sleep(delay);
  isTyping.value = false;
  messages.value.push({ id: Date.now() + Math.random(), from: 'bot', text });
  scrollToBottom();
  await nextTick();
  if (step.value < 4) inputEl.value?.focus();
}

async function send() {
  const val = inputValue.value.trim();
  if (isTyping.value) return;
  if (!val && step.value !== 3) return;

  messages.value.push({ id: Date.now(), from: 'user', text: val || '—' });
  inputValue.value = '';
  scrollToBottom();

  if (step.value === 1) {
    if (val.length < 3) {
      await addBotMessage('Could you tell us a bit more? 😊', 400);
      return;
    }
    userData.message = val;
    step.value = 2;
    await addBotMessage("Got it! What's your email so we can reach you?");

  } else if (step.value === 2) {
    if (!isValidEmail(val)) {
      await addBotMessage("Hmm, that doesn't look like a valid email — try again? 😊", 400);
      step.value = 2;
      return;
    }
    userData.email = val;
    step.value = 3;
    await addBotMessage('And your phone number? (optional — you can skip)');

  } else if (step.value === 3) {
    if (val && !isValidPhone(val)) {
      await addBotMessage("That phone number doesn't look right — try again or hit Skip 😊", 400);
      step.value = 3;
      return;
    }
    userData.phone = val;
    await finish();
  }
}

// ── Validation helpers ─────────────────────────────────
function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function isValidPhone(phone) {
  const digits = phone.replace(/\D/g, '');
  return digits.length >= 6 && /^[+\d\s\-().]+$/.test(phone);
}

async function skipPhone() {
  messages.value.push({ id: Date.now(), from: 'user', text: 'Skip' });
  userData.phone = '';
  scrollToBottom();
  await finish();
}

async function finish() {
  step.value = 4;
  await submitInquiry();
  await addBotMessage("Thanks! Rei will get back to you soon. 💚", 600);
}

// ── Submit ─────────────────────────────────────────────
async function submitInquiry() {
  try {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    await fetch(route('orders.quick'), {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json',
      },
      body: JSON.stringify({
        email:   userData.email,
        phone:   userData.phone,
        message: userData.message,
      }),
    });
  } catch (_) { /* fail silently */ }
}

// ── Helpers ────────────────────────────────────────────
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

function scrollToBottom() {
  nextTick(() => {
    if (messagesEl.value) {
      messagesEl.value.scrollTop = messagesEl.value.scrollHeight;
    }
  });
}

// ── Listen for external open trigger ──────────────────
function handleOpenEvent() {
  if (!isOpen.value) toggle();
}

onMounted(() => {
  window.addEventListener('open-rei-chat', handleOpenEvent);
});

onUnmounted(() => {
  window.removeEventListener('open-rei-chat', handleOpenEvent);
});
</script>
