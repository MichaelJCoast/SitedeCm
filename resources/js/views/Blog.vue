<template>
  <div class="container min-h-screen mt-6 mx-auto px-8 md:px-12 text-white">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <PostCard v-for="post in posts" :key="post.id" :post="post" :category="categories" />
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
    store.dispatch("getCategories");

    return {
      posts: computed(() => store.state.posts.data),
      categories: computed(() => store.state.posts.categories),
    };
  },
  components: { PostCard },
};
</script>