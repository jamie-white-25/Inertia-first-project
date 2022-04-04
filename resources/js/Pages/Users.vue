<template>
  <layout>
    <Nav />
    <h1>Users</h1>
    <p>{{ time }}</p>
  </layout>
</template>

<script setup>
import Layout from "../Shared/Layout.vue";
const props = defineProps({
  time: String,
});
</script>

<style>
</style>