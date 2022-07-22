<template>
  <div class="container min-h-screen mx-auto mb-6 lg:mt-6">
                <div class="grid grid-flow-row lg:grid-flow-col">
                  <img class="h-96 mx-auto" :src="'../' + product.photo" :alt="product.name + ' image'">

                    <div class="text-white mt-6 px-8 md:px-14 space-y-4 md:w-3/4">
                        <h2 class="font-semibold text-xl">{{product.name}}</h2>
                        <p v-html="product.description" class="text-gray-400"></p>
                        <p class="font-semibold text-lg">€{{ product.price }}</p>
                        <div v-if="product.size == 1" class="grid grid-cols-5 gap-0">
                            <x-product-size>XS</x-product-size>
                            <x-product-size>S</x-product-size>
                            <x-product-size>M</x-product-size>
                            <x-product-size>L</x-product-size>
                            <x-product-size>XL</x-product-size>
                        </div>
                        <button type="submit" class="p-4 rounded-md uppercase bg-red-700 hover:brightness-125">
                            <p class="font-bold text-gray-100">Adicionar ao carrinho</p>
                        </button>
                    </div>
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
    store.dispatch("getProductById", route.params.id);

    return {
      product: computed(() => store.state.currentProduct),
    };
  },
};
</script>
