<template>
  <main>
    <Nav />
    <div class="container mx-auto">
      <slot />
    </div>
  </main>
</template>

<script setup>
import Nav from "./Nav.vue";
</script>

<style>
</style>