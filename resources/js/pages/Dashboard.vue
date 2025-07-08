<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1: Tasks -->
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <div class="text-3xl font-bold text-blue-600">24</div>
                <div class="mt-2 text-gray-600">Open Tasks</div>
            </div>
            <!-- Card 2: Completed -->
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <div class="text-3xl font-bold text-green-600">18</div>
                <div class="mt-2 text-gray-600">Completed Tasks</div>
            </div>
            <!-- Card 3: Overdue -->
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <div class="text-3xl font-bold text-red-600">3</div>
                <div class="mt-2 text-gray-600">Overdue Tasks</div>
            </div>
        </div>

        <div class="mt-10 bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-100 rounded-xl shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-6 border-b border-gray-200 dark:border-gray-700 pb-2">
                Recent Activity
            </h2>
            <ul class="space-y-4">
                <li
                    class="flex items-start justify-between hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg px-3 py-2 transition">
                    <div class="flex items-start gap-2">
                        <span class="text-xl">📝</span>
                        <span>Created new task: <strong>Design login page</strong></span>
                    </div>
                    <span class="text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">2 hours ago</span>
                </li>
                <li
                    class="flex items-start justify-between hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg px-3 py-2 transition">
                    <div class="flex items-start gap-2">
                        <span class="text-xl">✅</span>
                        <span>Completed task: <strong>Update documentation</strong></span>
                    </div>
                    <span class="text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">5 hours ago</span>
                </li>
                <li
                    class="flex items-start justify-between hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg px-3 py-2 transition">
                    <div class="flex items-start gap-2">
                        <span class="text-xl">📌</span>
                        <span>Assigned task: <strong>Fix bug #123</strong></span>
                    </div>
                    <span class="text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">1 day ago</span>
                </li>
            </ul>
        </div>

    </AppLayout>
</template>
