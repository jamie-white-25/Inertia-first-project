<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div
    class="
      bg-none
      py-3
      flex
      items-center
      justify-between
      border-t border-gray-200
    "
  >
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <nav
          class="relative z-0 inline-flex rounded-md shadow-sm space-x-1"
          aria-label="Pagination"
        >
          <Component
            v-for="link in links"
            :is="link.url ? 'Link' : 'span'"
            :key="link"
            :href="link.url"
            v-html="link.label"
            class="
              relative
              inline-flex
              items-center
              px-2
              py-2
              rounded-md
              border border-gray-300
              text-sm
              font-medium
              text-gray-600
              hover:bg-gray-50
            "
          />

          <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
        </nav>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  links: Array,
});
</script>

<style>
</style>