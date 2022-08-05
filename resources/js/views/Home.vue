<template>
    <div v-if="posts.length" class="container min-h-screen mx-auto px-8 md:px-12 mb-10 text-white space-y-6">
    <Carousel :carousel="carousel_items"/>
        <div class="mt-6">
            <router-link to="/blog" class="sm:mt-0 text-2xl 2xl:text-3xl font-semibold py-6">Últimas Notícias</router-link>
        </div>  
                <div v-if="posts.length" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-4">
                        <PostCard v-for="post in posts" :key="post.id" :post="post" :category="categories" />
                </div>
            <div v-if="posts.length > 6" class="text-center">
                <router-link to="/blog" class="font-semibold transition ease-in-out rounded-lg text-lg bg-transparent hover:bg-neutral-600 px-4 py-2">Mais Notícias</router-link>
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
    store.dispatch("getLatestPosts");
    store.dispatch("getCategories");
    store.dispatch("getCarousel");
    
    return {
      posts: computed(() => store.state.posts.data),
      categories: computed(() => store.state.posts.categories),
      carousel_items: computed(() => store.state.carousel.data),
    };
  },
  components: { PostCard, Carousel },
};
</script>