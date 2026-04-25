<script setup lang="ts">
defineProps<{
  title: string;
  value?: string | number;
  actionColor?: "green" | "red";
}>();
</script>

<template>
  <div class="flex items-center justify-between px-6 py-3 bg-gray-100 border-r last:border-r-0 border-gray-300 bg-white h-30">
    <div>
      <p class="text-xs uppercase text-gray-500 tracking-wide font-medium">
        {{ title }}
      </p>

      <div class="flex items-center gap-2 mt-2">
        <!-- Icon -->
        <div class="text-gray-500">
          <slot name="icon" />
        </div>

        <!-- Value -->
        <h1 class="text-xl font-semibold text-gray-700">
          {{ value ?? 0 }}
        </h1>
      </div>
    </div>

    <!-- Action Button -->
    <button :class="[
      'w-5 h-5 flex items-center justify-center rounded-full border text-xs',
      actionColor === 'red'
        ? 'border-red-500 text-red-500'
        : 'border-green-500 text-green-500'
    ]">
      +
    </button>
  </div>
</template>