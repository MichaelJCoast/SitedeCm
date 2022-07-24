<template>
  <div class="container min-h-screen mx-auto mb-6 lg:mt-6">
    <div class="flex flex-row justify-between px-14">
      <div class="flex flex-col justify-between w-full">
        <div v-for="item in items" :key="item.id" :item="item" class="flex flex-row items-start text-white w-full">
          <img class="w-40 h-auto" :src="item.photo" />
          <div class="flex flex-col px-4 w-full text-neutral-200">
            <div class="flex flex-row justify-between">
              <h1 class="text-2xl font-bold">{{ item.name }}</h1>
              <span class="text-2xl font-bold mr-6">{{ item_cost(item) }}€</span>
            </div>
            <p class="text-sm">{{ product_total(item) + 'x' }}</p>
            <a @click="removeFromCart(item)" class="underline font-semibold text-neutral-200 cursor-pointer">Remover</a>
          </div>
        </div>
      </div>
      <div class="text-neutral-200 flex flex-col bg-black px-8 py-6 space-y-4">
        <h3 class="text-2xl font-semibold">Sumário</h3>
        <p class="text-neutral-100">Para efetuar a encomenda precisamos dos dados abaixo.</p>
        <input type="text" id="first_name" class="bg-gray-50" placeholder="Primeiro e Último Nome" />
        <input type="text" id="first_name" class="bg-gray-50" placeholder="E-mail" />
        <div class="flex flex-row items-center justify-between">
          <p class="text-2xl">Total</p>
          <p class="text-2xl font-black">{{cart_total.toFixed(2) + '€'}}</p>
        </div>
        <button class="bg-red-600 px-4 py-2">Efetuar Encomenda</button>
      </div>
    </div>
  </div>
</template>

<script>
import { computed } from "vue";
import { useStore } from "vuex";
export default {
  data() {
    const store = useStore();

    return {
      product: computed(() => store.state.currentProduct),
    };
  },
  computed: {
    items() {
      return this.$store.getters.cartItems;
    },
    cart_total() {
      return this.$store.getters.cartItems.reduce((a, b) => a + (b.price * b.quantity), 0)
    }
  },
  methods: {
    product_total(product) {
      return this.$store.getters.productQuantity(product)
    },
    item_cost(item) {
      return item.price * item.quantity
    },
    removeFromCart(item) {
      this.$store.commit('removeFromCart', item)
    }
  }
};
</script>
