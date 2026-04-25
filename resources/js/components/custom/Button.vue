<script setup lang="ts">
const props = defineProps<{
  label?: string
  url?: string
  type?: 'button' | 'submit' | 'reset'
}>()
</script>

<template>
  <button
    :type="props.type || 'button'"
    class="bg-[#3283f7] hover:bg-[#662B8E] duration-300 px-6 py-2 text-white rounded-md cursor-pointer"
  >
    {{ props.label }}
  </button>
</template>
