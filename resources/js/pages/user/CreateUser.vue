<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: '',
});

const submitForm = () => {
    form.post(route('users.store'), {
        onSuccess: () => {
            form.reset();
        },
        onError: () => {
            console.log(form.errors);
        }
    });
};
</script>

<template>
    <AppLayout>
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="w-full max-w-md">
                <div class="bg-white shadow-lg rounded-xl border border-gray-200">
                    <div class="bg-blue-600 text-white text-lg font-semibold px-8 py-4 rounded-t-xl">
                        Create New User
                    </div>

                    <div class="p-8 bg-gray-50 rounded-b-xl">
                        <form @submit.prevent="submitForm" class="space-y-6">

                            <!-- Name -->
                            <div>
                                <label for="name" class="block mb-2 font-medium text-gray-700 text-base">Name</label>
                                <input v-model="form.name" id="name" type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-base text-gray-900 placeholder-gray-500"
                                    placeholder="Enter User name..." required />
                                <div v-if="form.errors.name" class="text-red-500 text-sm mt-2">
                                    {{ form.errors.name }}
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block mb-2 font-medium text-gray-700 text-base">Email</label>
                                <input v-model="form.email" id="email" type="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-base text-gray-900 placeholder-gray-500"
                                    placeholder="Enter email" required />
                                <div v-if="form.errors.email" class="text-red-500 text-sm mt-2">{{ form.errors.email }}
                                </div>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
                                <input v-model="form.password" id="password" type="password"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-base text-gray-900 placeholder-gray-500"
                                    placeholder="Enter password" required />
                                <div v-if="form.errors.password" class="text-red-500 text-sm mt-2">{{
                                    form.errors.password }}</div>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block mb-2 font-medium text-gray-700">Confirm
                                    Password</label>
                                <input v-model="form.password_confirmation" id="password_confirmation" type="password"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-base text-gray-900 placeholder-gray-500"
                                    placeholder="Confirm password" required />
                                <div v-if="form.errors.password_confirmation" class="text-red-500 text-sm mt-2">{{
                                    form.errors.password_confirmation }}</div>
                            </div>

                            <!-- Role -->
                            <div>
                                <label for="role" class="block mb-2 font-medium text-gray-700">Role</label>
                                <select v-model="form.role" id="role"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-base text-gray-900 placeholder-gray-500"
                                    required>
                                    <option value="" disabled>Select a role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    <option value="manager">Manager</option>
                                    <!-- Add more roles as needed -->
                                </select>
                                <div v-if="form.errors.role" class="text-red-500 text-sm mt-2">{{ form.errors.role }}
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end pt-4">
                                <button type="submit"
                                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-medium text-base min-w-[140px]"
                                    :disabled="form.processing">
                                    {{ form.processing ? 'Creating...' : 'Create User' }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
