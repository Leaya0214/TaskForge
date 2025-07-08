<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
   <div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-gray-100 via-white to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 p-6 md:p-10">
    <div class="w-full max-w-md rounded-2xl bg-white shadow-xl dark:bg-gray-950 border border-gray-200 dark:border-gray-800 p-8">
        <div class="flex flex-col gap-8">
            <!-- Logo and Title Section -->
            <div class="flex flex-col items-center gap-4">
                <Link :href="route('home')" class="flex flex-col items-center gap-2 font-medium">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-800">
                        <AppLogoIcon class="size-8 text-primary" />
                    </div>
                    <span class="sr-only">{{ title }}</span>
                </Link>
                <div class="text-center">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ title }}</h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ description }}</p>
                </div>
            </div>

            <!-- Page Content -->
            <slot />
        </div>
    </div>
</div>

</template>
