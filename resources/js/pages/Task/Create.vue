<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
const form = useForm({
    title: '',
    description: '',
    priority: '',
    due_date: '',
    status: '',
    assigned_to: '',
});

const {users} = usePage().props;

const submitForm =() =>{
    form.post(route('task.store'),{
        onSuccess: () =>{
            form.reset();
        },
        onError:() => {
            console.log(form.errors());
        }
    })
}

</script>

<template>
    <AppLayout>
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="w-full max-w-4xl">
                <div class="bg-white shadow-lg rounded-xl border border-gray-200">
                    <div class="bg-blue-600 text-white text-lg font-semibold px-8 py-4 rounded-t-xl">
                        Create New Task
                    </div>

                    <div class="p-8 bg-gray-50 rounded-b-xl">
                        <form @submit.prevent="submitForm" class="space-y-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block mb-2 font-medium text-gray-700 text-base">Title</label>
                                <input v-model="form.title" id="title" type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-base text-gray-900 placeholder-gray-500"
                                    placeholder="Enter task title..."
                                    required />
                                <div v-if="form.errors.title" class="text-red-500 text-sm mt-2">
                                    {{ form.errors.title }}
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block mb-2 font-medium text-gray-700 text-base">
                                    Description
                                </label>
                                <textarea v-model="form.description" id="description" rows="5"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-base resize-vertical text-gray-900 placeholder-gray-500"
                                    placeholder="Enter task description..."></textarea>
                                <div v-if="form.errors.description" class="text-red-500 text-sm mt-2">
                                    {{ form.errors.description }}
                                </div>
                            </div>

                            <!-- Two Column Layout for Priority and Due Date -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Priority -->
                                <div>
                                    <label for="priority" class="block mb-2 font-medium text-gray-700 text-base">Priority</label>
                                    <select v-model="form.priority" id="priority"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none text-base">
                                        <option value="">Select priority</option>
                                        <option value="low">Low</option>
                                        <option value="normal">Normal</option>
                                        <option value="high">High</option>
                                    </select>
                                    <div v-if="form.errors.priority" class="text-red-500 text-sm mt-2">
                                        {{ form.errors.priority }}
                                    </div>
                                </div>

                                <!-- Due Date -->
                                <div>
                                    <label for="due_date" class="block mb-2 font-medium text-gray-700 text-base">Due Date</label>
                                    <input v-model="form.due_date" id="due_date" type="date"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-base text-gray-900" />
                                    <div v-if="form.errors.due_date" class="text-red-500 text-sm mt-2">
                                        {{ form.errors.due_date }}
                                    </div>
                                </div>
                            </div>

                            <!-- Two Column Layout for Status and Assigned To -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Status -->
                                <div>
                                    <label for="status" class="block mb-2 font-medium text-gray-700 text-base">Status</label>
                                    <select v-model="form.status" id="status"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none text-base">
                                        <option value="">Select status</option>
                                        <option value="pending">Pending</option>
                                        <option value="in_progress">In Progress</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                    <div v-if="form.errors.status" class="text-red-500 text-sm mt-2">
                                        {{ form.errors.status }}
                                    </div>
                                </div>

                                <!-- Assigned To -->
                                <div>
                                    <label for="assigned_to" class="block mb-2 font-medium text-gray-700 text-base">Assigned To</label>
                                    <select v-model="form.assigned_to" id="assigned_to"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none text-base">
                                        <option value="">Select user</option>
                                        <option v-for="user in users"
                                        :key="user.id"
                                        :value="user.id"
                                        >
                                        {{user.name}}
                                    </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end pt-4">
                                <button type="submit"
                                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-medium text-base min-w-[140px]"
                                    :disabled="form.processing">
                                    {{ form.processing ? 'Submitting...' : 'Create Task' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
