<template>
    <h1 >{{ posts.title }}</h1>
</template>

<script setup>
import store from "../store";
import { computed } from "vue";

const posts = computed(() => store.state.posts);

store.dispatch("getPosts");
</script>