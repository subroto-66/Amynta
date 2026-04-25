<script setup lang="ts">
import { Moon, Sun } from 'lucide-vue-next';
import { ref, onMounted } from 'vue';

const isDark = ref(false);

const toggleDark = () => {
    isDark.value = !isDark.value;
    document.documentElement.classList.toggle('dark', isDark.value);

    localStorage.setItem('theme', isDark.value ? 'dark' : 'light');
};

onMounted(() => {
    const saved = localStorage.getItem('theme');

    if (saved === 'dark') {
        isDark.value = true;
    } else if (saved === 'light') {
        isDark.value = false;
    } else {
        isDark.value = window.matchMedia('(prefers-color-scheme: dark)').matches;
    }

    document.documentElement.classList.toggle('dark', isDark.value);
});
</script>

<template>
    <button
        @click="toggleDark"
        class="p-2 rounded-md hover:bg-neutral-200 dark:hover:bg-neutral-700 transition cursor-pointer text-[#352264] dark:text-white"
    >
        <Sun v-if="isDark" class="w-5 h-5" />
        <Moon v-else class="w-5 h-5" />
    </button>
</template>