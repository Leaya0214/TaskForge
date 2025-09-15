<script setup>
import AppSidebar from '@/components/AppSidebar.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'
import { defineProps } from 'vue';
import { router } from '@inertiajs/vue3'


const { users } = defineProps({
    users: Array
});
console.log(users);
const deleteUser = (id) => {
    if (confirm('Are you sure you want to delete this user?')) {
        router.delete(route('users.destroy', id), {
            onSuccess: () => {
                console.log('User deleted');
            },
            onError: (errors) => {
                console.error('Delete failed', errors);
            }
        });
    }
}
</script>

<template>
    <AppLayout>
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-white-800">User List</h1>
                <Link 
                v-if="isAdmin"
                :href="route('users.create', {}, false)"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + New User
                </Link>
            </div>

            <div class="bg-white shadow rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role</th>
                            <th  v-if="isAdmin" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        <tr v-for="user in users" :key="user.id">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ user.id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ user.name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ user.email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ user.role }}</td>
                            <td
                            v-if="isAdmin"
                                class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium text-white bg-gray-900">
                                <Link :href="route('users.edit', user.id)"
                                    class="text-indigo-400 hover:text-indigo-600 mr-3">Edit</Link>
                                <button @click="deleteUser(user.id)" class="text-red-400 hover:text-red-600">
                                    Delete
                                </button>

                            </td>
                        </tr>
                    </tbody>


                </table>
            </div>
        </div>

    </AppLayout>
</template>