<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

// Props from Inertia (e.g. passed from controller)
const props = defineProps({
  user: Object,
});

// Initialize form with existing user data
const form = useForm({
  name: props.user.name || '',
  email: props.user.email || '',
  password: '',
  password_confirmation: '',
  role: props.user.role || '',
});

const submitForm = () => {
  form.put(route('users.update', props.user.id), {
    onSuccess: () => {
      console.log('User updated');
    },
    onError: () => {
      console.log(form.errors);
    },
  });
};
</script>

<template>
  <AppLayout>
    <div class="min-h-screen flex items-center justify-center p-4">
      <div class="w-full max-w-3xl">
        <div class="bg-white shadow-lg rounded-xl border border-gray-200">
          <div class="bg-blue-600 text-white text-lg font-semibold px-8 py-4 rounded-t-xl">
            Edit User
          </div>

          <div class="p-8 bg-gray-50 rounded-b-xl">
            <form @submit.prevent="submitForm" class="space-y-6">
              <!-- Name -->
              <div>
                <label for="name" class="block mb-2 font-medium text-gray-700">Name</label>
                <input
                  v-model="form.name"
                  type="text"
                  id="name"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900"
                  placeholder="Enter name"
                  required
                />
                <div v-if="form.errors.name" class="text-red-500 text-sm mt-2">
                  {{ form.errors.name }}
                </div>
              </div>

              <!-- Email -->
              <div>
                <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
                <input
                  v-model="form.email"
                  type="email"
                  id="email"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900"
                  placeholder="Enter email"
                  required
                />
                <div v-if="form.errors.email" class="text-red-500 text-sm mt-2">
                  {{ form.errors.email }}
                </div>
              </div>

              <!-- Password -->
              <div>
                <label for="password" class="block mb-2 font-medium text-gray-700">New Password</label>
                <input
                  v-model="form.password"
                  type="password"
                  id="password"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900"
                  placeholder="Leave blank to keep current"
                />
                <div v-if="form.errors.password" class="text-red-500 text-sm mt-2">
                  {{ form.errors.password }}
                </div>
              </div>

              <!-- Confirm Password -->
              <div>
                <label for="password_confirmation" class="block mb-2 font-medium text-gray-700">Confirm Password</label>
                <input
                  v-model="form.password_confirmation"
                  type="password"
                  id="password_confirmation"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900"
                />
                <div v-if="form.errors.password_confirmation" class="text-red-500 text-sm mt-2">
                  {{ form.errors.password_confirmation }}
                </div>
              </div>

              <!-- Role -->
              <div>
                <label for="role" class="block mb-2 font-medium text-gray-700">Role</label>
                <select
                  v-model="form.role"
                  id="role"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 bg-white"
                  required
                >
                  <option value="">Select Role</option>
                  <option value="admin">Admin</option>
                  <option value="manager">Manager</option>
                  <option value="employee">Employee</option>
                  <!-- If you use props.roles, you can loop like this: -->
                  <!-- <option v-for="role in roles" :key="role" :value="role">{{ role }}</option> -->
                </select>
                <div v-if="form.errors.role" class="text-red-500 text-sm mt-2">
                  {{ form.errors.role }}
                </div>
              </div>

              <!-- Submit -->
              <div class="flex justify-end pt-4">
                <button
                  type="submit"
                  class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-medium text-base"
                  :disabled="form.processing"
                >
                  {{ form.processing ? 'Updating...' : 'Update User' }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
