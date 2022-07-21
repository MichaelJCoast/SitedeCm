<template>
  <div class="container min-h-screen mx-auto text-white">
    <img
      class="lg:w-[95%] xl:w-[75%] 2xl:w-[50%] mx-auto"
      :src="'../' + post.landscaped_image"
      alt="post image"
    />
    <div class="px-8 pb-14 lg:px-52 xl:px-80">
       <template v-for="category in category" :key="category.id" >     
          <p class="mt-6 text-sm uppercase tracking-[.2em] text-red-600" v-if="category.id == post.category_id">{{category.name}}</p>
      </template>

      <h2
        class="text-4xl sm:text-3xl md:text-5xl lg:text-4xl text-white font-bold sm:leading-normal"
      >
        {{ post.title }}
      </h2>
      <p
        class="mt-6 mb-6 text-xs md:text-sm font-normal text-gray-400 sm:font-semibold"
      >
        {{ formattedDate }}
      </p>
      <div
        v-html="post.body"
        class="text-justify md:text-lg 2xl:text-xl leading-relaxed text-gray-200"
      ></div>
    </div>
  </div>
</template>

<script>
import { computed } from "vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";
export default {
  data() {
    const route = useRoute();
    const store = useStore();
    store.dispatch("getPostBySlug", route.params.slug);
    store.dispatch("getCategories");

    return {
      post: computed(() => store.state.currentPost),
      category: computed(() => store.state.posts.categories),
      category_id: computed(() => store.state.posts.categories.filter(category => category.id === post.category_id)),
    };
  },
  computed: {
    formattedDate() {
      return (this.post.created_at = new Date(
        this.post.created_at
      ).toLocaleDateString("pt-PT", {
        day: "numeric",
        month: "long",
        year: "numeric",
      }));
    },
  },
};
</script>
