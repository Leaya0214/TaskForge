
<script setup>
    import Header from './Header.vue';
    import HeroSection  from './HeroSection.vue';
    import About from './About.vue';
    import FeatureSection from './FeatureSection.vue';
    import Footer from './Footer.vue';
</script>
<template>
  <div class="min-h-screen bg-gray-50 text-gray-800 font-sans">

    <!-- Header -->
   <Header />
    <!-- Hero Section -->
    <HeroSection />

    <!-- About Section -->
    <About />
    <FeatureSection />
    <FeatureSection />
    <Footer />

  </div>
</template>
