<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue'
import toastr from 'toastr'


const form = useForm({
    title: '',
    description: '',
    priority: '',
    due_date: '',
    status: '',
    assigned_to: '',
});

const page = usePage();
const { users } = usePage().props;
const submitForm = () => {
    form.post(route('role-permission.store'), {
        onSuccess: () => {
            form.reset();
        },
        onError: () => {
            console.log(form.errors());
        }
        
    })
}
onMounted(() => {
  const flash = page.props.flash || {};

  if (flash.success) {
    toastr.success(flash.success);
  }
  if (flash.error) {
    toastr.error(flash.error);
  }
});
</script>

<template>
    <AppLayout>
        <div class=" flex items-center justify-center p-4">
            <div class="w-full max-w-4xl">
                <div class="bg-white shadow-lg rounded-xl border border-gray-200">
                    <div class="bg-blue-600 text-white text-lg font-semibold px-8 py-4 rounded-t-xl">
                        Create New Role
                    </div>

                    <div class="p-8 bg-gray-50 rounded-b-xl">
                        <form @submit.prevent="submitForm" class="space-y-6">
                            <!-- Title -->
                            <div>
                                <label for="role" class="block mb-2 font-medium text-gray-700 text-base">Role</label>
                                <input v-model="form.title" id="title" type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-base text-gray-900 placeholder-gray-500"
                                    placeholder="Enter Role Here..." required />
                                <div v-if="form.errors.title" class="text-red-500 text-sm mt-2">
                                    {{ form.errors.title }}
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end pt-4">
                                <button type="submit"
                                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-medium text-base min-w-[140px]"
                                    :disabled="form.processing">
                                    {{ form.processing ? 'Submitting...' : 'Create Role' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
