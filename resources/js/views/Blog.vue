<template>
  <div class="container mt-6 mx-auto px-8 md:px-14 mb-10 text-white">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <PostCard v-for="post in posts" :key="post.id" :post="post" />
    </div>
  </div>
</template>

<script>
import { useStore } from "vuex";
import { computed } from "vue";
import PostCard from "../components/PostCard.vue";
export default {
  setup() {
    const store = useStore();
    store.dispatch("getPosts");
    return {
      posts: computed(() => store.state.posts.data),
    };
  },
  components: { PostCard },
};
</script>