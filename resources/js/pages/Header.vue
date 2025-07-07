<template>
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-3xl font-extrabold tracking-tight cursor-pointer select-none">
                <span class="text-indigo-600">Task</span><span class="text-pink-600">Forge</span>
            </h1>

            <!-- Navigation -->
            <nav class="space-x-4 hidden md:flex">
                <a href="/"
                    class="px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-indigo-600 hover:text-white transition">
                    Home
                </a>
                <a href="/dashboard"
                    class="px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-indigo-600 hover:text-white transition">
                    Dashboard
                </a>
                <a href="/login"
                    class="px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-indigo-600 hover:text-white transition">
                    Login
                </a>
            </nav>

            <!-- Mobile Menu Button (optional) -->

            <button class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-200" @click="toggleMobileMenu"
                aria-label="Toggle mobile menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <nav v-if="mobileMenuOpen" class="md:hidden mt-2 space-y-2 bg-white shadow rounded-lg p-4">
                <a href="/" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Home</a>
                <a href="/dashboard" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Dashboard</a>
                <a href="/login" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Login</a>
            </nav>

        </div>
    </header>

</template>

<script setup>
import { ref } from 'vue'

const mobileMenuOpen = ref(false)

function toggleMobileMenu() {
    mobileMenuOpen.value = !mobileMenuOpen.value
}
</script>
