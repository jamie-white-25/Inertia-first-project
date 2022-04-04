<template>
  <Link
    class="mr-5 px-3 hover:text-gray-900 text-gray-600"
    :class="{ 'text-teal-800': active }"
  >
    <slot />
  </Link>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
const props = defineProps({
  active: Boolean,
});
</script>

<style>
</style>