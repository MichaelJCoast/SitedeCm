<template>
<div>
<Carousel/>
    <div v-if="posts.length" class="container mx-auto px-8 md:px-14 mb-10 text-white space-y-6">
        <div class="mt-6">
            <h1 class="sm:mt-0 text-2xl 2xl:text-3xl font-semibold py-6">Últimas Notícias</h1>
        </div>  
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-6">
                        <PostCard v-for="post in posts" :key="post.id" :post="post" />
                </div>
            <div class="text-center">
                <router-link to="/blog" class="font-semibold transition ease-in-out rounded-lg text-lg bg-transparent hover:bg-neutral-600 px-4 py-2">Mais Notícias</router-link>
            </div>
    </div>
</div>
</template>

<script>
import { useStore } from "vuex";
import { computed } from "vue";
import PostCard from "../components/PostCard.vue";
import Carousel from "../components/Carousel.vue";
export default {
  setup() {
    const store = useStore();
    store.dispatch("getPosts");
    return {
      posts: computed(() => store.state.posts.data),
    };
  },
  components: { PostCard, Carousel },
};
</script>