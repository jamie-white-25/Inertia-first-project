<template>
    <Nav />
    <h1>Users</h1>
    <p>{{ time }}</p>
</template>

<script setup>
import Layout from "../Shared/Layout.vue";
defineProps({
  time: String,
});
</script>

// default layout
<script>
export default {
  layout: Layout,
};
</script>

<style>
</style>