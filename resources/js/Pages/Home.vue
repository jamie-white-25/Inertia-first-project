<template>
  <div class="">
    <Nav />
    <h1>hello world, number of clicks {{ counter }}</h1>
    <h2>{{ props.user }}</h2>
    <button @click="counter++">add</button>
  </div>
</template>

<script setup>
import { ref } from "vue";
import Nav from "../Shared/Nav.vue";

const props = defineProps({
  user: String,
});

const counter = ref(0);
</script>

<style>
</style>