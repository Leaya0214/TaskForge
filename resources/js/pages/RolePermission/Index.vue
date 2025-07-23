<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <AppLayout>
        <div class="space-y-6 p-6">
            <!-- Header Section -->
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-semibold text-white-800">Role & Permission</h1>
                <Link :href="route('role-permission.create', {}, false)"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                + New Role
                </Link>
            </div>

            <!-- Table Section -->
            <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Permissions</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <!-- Loop through roles here -->
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
