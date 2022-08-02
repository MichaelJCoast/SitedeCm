<template>
  <div class="container min-h-screen mx-auto mb-6 lg:mt-6">
    <div class="grid grid-flow-row lg:grid-flow-col">
      <img class="h-96 mx-auto" :src="'../' + product.photo" :alt="product.name + ' image'">
      <div class="text-white mt-6 px-8 md:px-14 space-y-4 md:w-3/4">
        <h2 class="font-semibold text-xl">{{ product.name }}</h2>
        <p v-html="product.description" class="text-gray-400"></p>
        <p class="font-semibold text-lg">€{{ product.price }}</p>
          <RadioGroup class="flex flex-row" v-model="size">
        <RadioGroupLabel class="sr-only">Tamanhos</RadioGroupLabel>
          <RadioGroupOption
            as="button"
            v-for="size in product.sizes"
            :key="size.id"
            :value="size.name"
            v-slot="{ checked }"
          >
            <div
              :class="[
                checked ? 'border border-white bg-white' : 'border border-white',
              ]"
              class="relative flex cursor-pointer px-6 py-4 shadow-md focus:outline-none"
            >
              <div class="flex w-full items-center justify-between">
                <div class="flex items-center">
                  <div class="text-sm">
                    <RadioGroupLabel
                      as="p"
                      :class="checked ? 'text-neutral-900' : 'text-white'"
                      class="font-semibold text-lg"
                    >
                      {{ size.name }}
                    </RadioGroupLabel>
                  </div>
                </div>
              </div>
            </div>
          </RadioGroupOption>
      </RadioGroup>
      <button @click="addToCart()" type="submit" class="p-4 rounded-md uppercase bg-red-700 hover:brightness-125">
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
import { ref } from 'vue'
import {
  RadioGroup,
  RadioGroupLabel,
  RadioGroupOption,
} from '@headlessui/vue';

export default {
  data() {
    const route = useRoute();
    const store = useStore();
    store.dispatch("getProductById", route.params.id);

    return {
      product: computed(() => store.state.currentProduct),
      size: ref('size.id'),
    };
  },
  methods: {
    addToCart() {
      this.$store.commit('addToCart', {product: this.product, selectedSize: this.size});
    },
  },
  components: {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
  },
};
</script>


<!-- <select name="sizes" @change="updateSize">
          <option v-for="size in product.sizes" :key=size.name :value=size.name>{{ size.name }}</option>
        </select> -->