<template>
  <div class="container min-h-screen mx-auto px-8 md:px-12 mb-10 text-white">
    <h2 class="sm:mt-0 text-2xl 2xl:text-3xl font-semibold py-6">Merch</h2>
    <Loading v-if="loading"/>
    <div v-else class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
      <MerchCard v-for="product in products" :key="product.id" :product="product" />
    </div>
  </div>
</template>

<script>
import MerchCard from "../components/MerchCard.vue";
import Loading from "../components/Loading.vue";
import { useStore } from "vuex";
import { computed } from "vue";
export default {
  setup() {
    const store = useStore();
    store.dispatch("getMerch");
    return {
      products: computed(() => store.state.merch.products),
      loading: computed(() => store.state.merch.loading),
    };
  },
  components: { MerchCard, Loading },
};
</script>