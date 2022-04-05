<template>
  <main>
    <Head >
      <title> Default </title>
      <meta type="description" content="this is default" head-key="description" />
    </Head>
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