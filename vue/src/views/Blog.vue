<template>
<div>
    <pre>{{posts}}</pre>
</div>
</template>

<script setup>
import store from "../store";
import { computed } from "vue";

const posts = computed(() => store.state.posts);

store.dispatch("getPosts");
</script>