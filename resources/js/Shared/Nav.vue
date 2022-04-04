<template>
  <header class="text-gray-200 body-font border-b border-gray-200">
    <div
      class="
        container
        mx-auto
        flex flex-wrap
        p-5
        flex-col
        md:flex-row
        items-center
      "
    >
      <Link
        class="
          flex
          title-font
          font-medium
          items-center
          text-gray-900
          mb-4
          md:mb-0
        "
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          class="w-10 h-10 text-white p-2 bg-teal-600 rounded-full"
          viewBox="0 0 24 24"
        >
          <path
            d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"
          ></path>
        </svg>
        <span class="ml-3 text-xl">Tailblocks</span>
      </Link>
      <nav
        class="md:ml-auto flex flex-wrap items-center text-base justify-center"
      >
        <nav-link href="/" :active="$page.component == 'Home'">Home</nav-link>
        <nav-link href="/users" :active="$page.component == 'Users'">
          Users
        </nav-link>
        <nav-link href="/settings" :active="$page.component == 'Settings'">
          Settings
        </nav-link>
        <Link
          class="mr-5 hover:text-gray-900 text-gray-600"
          href="/logout"
          method="post"
          as="button"
          :data="{ data: 'passed data' }"
          >Logout</Link
        >
      </nav>
      <button
        class="
          text-slate-100
          border
          shadow
          inline-flex
          items-center
          bg-teal-600
          py-1
          px-3
          focus:outline-none
          hover:bg-opacity-80
          rounded
          text-base
          mt-4
          md:mt-0
        "
      >
        Button
      </button>
    </div>
  </header>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import NavLink from "../Shared/NavLink.vue";
</script>

<style>
</style>