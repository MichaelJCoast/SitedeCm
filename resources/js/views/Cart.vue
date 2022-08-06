<template>
  <div class="container min-h-screen mx-auto px-8 md:px-14 mb-10 text-white">
    
    <h2 class="text-2xl 2xl:text-3xl font-semibold py-6">Carrinho</h2>

    <div v-if="items.length" class="flex flex-col lg:flex-row justify-between px-8 sm:px-14 space-y-4 sm:space-y-0">

      <div class="flex flex-col justify-between w-full space-y-2">
        <div v-for="(item, i) in items" :key="i" class="flex flex-row items-start text-white w-full">
          <img class="w-40 h-auto rounded-lg" :src="item.photo" />
          <div class="flex flex-col px-4 w-full text-neutral-200">
            <div class="flex flex-col sm:flex-row sm:justify-between ">
              <h1 class="text-lg sm:text-2xl font-bold">{{ item.name }}</h1>
              <span class="text-base sm:text-2xl font-bold mr-6">{{ item_cost(item).toFixed(2) }}€</span>
            </div>
            <p class="text-sm">{{ product_total(item, item.selectedSize) + 'x '}} <span v-if="item.selectedSize.length < 3">{{ item.selectedSize }}</span></p>
            <a @click="removeFromCart(item, item.selectedSize)" class="underline font-semibold text-neutral-200 cursor-pointer">Remover</a>
          </div>
        </div>
      </div>
      
      <div class="text-neutral-300 flex flex-col bg-black px-8 py-8 space-y-4 h-full rounded-3xl">
        <h3 class="text-2xl font-semibold">Sumário</h3>
        <p class="text-neutral-100">Para efetuar a encomenda precisamos dos dados abaixo.</p>

        <form @submit="submitOrder">

        <label for="name">Name</label>
        <input 
            type="text" 
            id="name" 
            name="name" 
            required
            class="mb-5 bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-700 focus:ring-1 focus:ring-red-700" 
            v-model="orderDetails.name" 
            placeholder="Primeiro e Último Nome" 
            >

        <label for="name">Email</label>
        <input 
            type="email" 
            id="email-address" 
            name="email" 
            autocomplete="email" 
            required="" 
            v-model="orderDetails.email" 
           class="mb-5 bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-red-700 focus:ring-1 focus:ring-red-700" 
            placeholder="E-mail" />


        <div class="flex flex-row items-center justify-between mb-5">
          <p class="text-2xl">Total</p>
          <p class="text-2xl font-black">{{cart_total.toFixed(2) + '€'}}</p>
        </div>
        <button type="submit" class="bg-red-600 px-4 py-2 w-full uppercase font-semibold rounded-lg hover:bg-red-500 transition ease-in-out">Efetuar Encomenda</button>
        </form>
      </div>
    </div>
    <div v-else>
      <p class="text-white font-semibold">Não há produtos no carrinho.</p>
    </div>
  </div>
</template>

<script>
import swal from 'sweetalert2'

import { useStore } from "vuex";
export default {
  data() {
    const store = useStore();

    const orderDetails = {
      name: null,
      email: null,
      order: store.state.cart.map(item => `${item.name} ${item.selectedSize} ${item.quantity}x`).join(', '),
      total: this.$store.getters.cartItems.reduce((a, b) => a + (b.price * b.quantity), 0),
      status_id: 1,
    }

    return {
      disabled: 0,
      orderDetails,
    };
  },
  computed: {
    items() {
      return this.$store.getters.cartItems;
    },
    cart_total() {
      return this.$store.getters.cartItems.reduce((a, b) => a + (b.price * b.quantity), 0);
    }
  },
  methods: {
    flash(message){
       swal.fire({
            title: 'Verifique a Encomenda no E-mail',
            text: "Foi enviado um e-mail de verificação",
            icon: 'success',
        });
    },
    product_total(product, selectedSize) {
      return this.$store.getters.productQuantity(product, selectedSize);
    },
    item_cost(item) {
      return item.price * item.quantity;
    },
    removeFromCart(item, selectedSize) {
      this.$store.commit('removeFromCart', {product: item, selectedSize: selectedSize});
    },
    submitOrder(e) {
      e.preventDefault();
      this.$store.dispatch('submitOrder', this.orderDetails);
      this.flash();
    }
  }
};
</script>
