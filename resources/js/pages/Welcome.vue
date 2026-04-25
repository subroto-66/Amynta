<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { dashboard, login } from '@/routes';

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);
</script>


<template>

    <Head title="Welcome" />

    <div class="relative min-h-screen text-[#1b1b18] dark:text-[#EDEDEC]">
        <div class="absolute inset-0 bg-image"></div>
        <!-- Overlay -->
        <div class="absolute inset-0 bg-linear-to-r from-[#351F62] to-[#1A043D]"></div>

        <!-- Content -->
        <div class="relative z-10 flex min-h-screen flex-col items-center p-6 lg:justify-center lg:p-8">

            <!-- Header -->
            <header class="mb-6 w-full max-w-4xl text-sm">
                <nav class="flex items-center justify-end gap-4">
                    <Link v-if="$page.props.auth.user" :href="dashboard()"
                        class="rounded-sm border px-5 py-1.5 text-sm hover:border-gray-400 text-white font-medium">
                        Dashboard
                    </Link>

                    <template v-else>
                        <Link :href="login()" class="rounded-sm px-5 py-1.5 text-lg hover:underline text-white font-medium">
                            Log in
                        </Link>

                    </template>
                </nav>
            </header>

            <!-- Main Content -->
            <main class="flex grow items-center justify-center">
                <h1 class="text-4xl font-bold text-white lg:text-6xl mt-10">
                    Welcome To Sanmo Bangladesh
                </h1>
            </main>

        </div>
    </div>
</template>

