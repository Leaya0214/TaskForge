<template>
        <section class="bg-gradient-to-r from-indigo-700 via-purple-700 to-pink-700 text-white">
      <div class="max-w-7xl mx-auto px-6 py-24 flex flex-col-reverse md:flex-row items-center gap-16">
        <!-- Text Content -->
        <div class="md:w-1/2 text-center md:text-left">
          <h1 class="text-5xl font-extrabold leading-tight mb-6 drop-shadow-lg">
            Organize Your Tasks <br />
            <span class="text-yellow-400">Effortlessly with TaskForge</span>
          </h1>
          <p class="text-lg mb-10 max-w-lg drop-shadow-md">
            TaskForge is your ultimate productivity tool. Manage projects, assign tasks, track progress, and
            collaborate with your team—all in one place.
          </p>
          <div class="space-x-5">
            <a href="/register" 
              class="inline-block bg-yellow-400 text-indigo-900 font-semibold px-8 py-3 rounded-lg shadow-lg hover:bg-yellow-300 transition">
              Get Started
            </a>
            <a href="/learn-more"
              class="inline-block border border-white px-8 py-3 rounded-lg hover:bg-white hover:text-indigo-700 transition font-semibold">
              Learn More
            </a>
          </div>
        </div>

        <!-- Illustration -->
        <div class="md:w-1/2 max-w-md mx-auto">
          <svg class="w-full h-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="none" stroke="currentColor" stroke-width="1.5" >
            <path
              d="M320 48C193.6 48 88 153.6 88 280c0 51.2 21.6 99.2 56 133.6l-42.4 56H192v-56h256v56h90.4l-42.4-56c34.4-34.4 56-82.4 56-133.6 0-126.4-105.6-232-232-232z"
              fill="#fbbf24"
            />
            <circle cx="320" cy="280" r="88" fill="#1e40af" />
            <path d="M320 192a88 88 0 0 1 88 88 88 88 0 1 1-176 0 88 88 0 0 1 88-88z" fill="#2563eb" />
          </svg>
        </div>
      </div>
    </section>
</template>