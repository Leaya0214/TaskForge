<script setup>
import AppSidebar from '@/components/AppSidebar.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3'
import { defineProps } from 'vue';
import { router } from '@inertiajs/vue3';


const { tasks } = defineProps({
    tasks: Array
});
const deleteTask = (id) => {
    if (confirm('Are you sure you want to delete this task?')) {
        router.delete(route('task.destroy', id), {
            onSuccess: () => {
                console.log('Task deleted');
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
                <h1 class="text-2xl font-bold text-white-800">Task List</h1>
                <Link :href="route('task.create', {}, false)" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + New Task
                </Link>
            </div>

            <div class="bg-white shadow rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Assigned To</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Priority</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                    <tr v-for="task in tasks" :key="task.id">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ task.id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ task.title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white break-words">
                                <span v-for="(line, idx) in task.description.split(' ').reduce((acc, word, i) => {
                                    if (i % 10 === 0) acc.push([]);
                                    acc[acc.length - 1].push(word);
                                    return acc;
                                }, []).map(words => words.join(' '))" :key="idx">
                                    {{ line }}<br>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ task.user.name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ task.priority }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ task.status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <Link :href="route('task.edit', task.id)"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</Link>
                                <button @click="deleteTask(task.id)"
                                    class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> 

    </AppLayout>
</template>