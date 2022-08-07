<template>
    <nav class="relative bg-black dark:bg-white border-b border-neutral-700">
      <div class="container flex flex-wrap mx-auto px-8 py-2 md:px-4 justify-between">         
        <div class="flex justify-between items-center h-16">
          <!-- Logo -->
          <router-link to="/">
            <NECMIconMono class="text-white dark:text-neutral-900 fill-current h-16 w-auto" />
          </router-link>
          <div class="hidden space-x-4 sm:ml-10 sm:flex sm:flex-wrap -mb-px">
          <scrollUp />
          <router-link
            v-for="item in navigation"
            :key="item.name"
            :to="item.to"
            :class="[
              this.$route.name === item.to.name
                ? 'inline-block rounded-t-lg p-6 border-red-600 border-b-2 cursor-pointer text-lg px-1 font-semibold text-white dark:text-neutral-900  hover:text-red-600 focus:outline-none transition duration-150 ease-in-out'
                : 'border-b-2 border-transparent p-6 hover:border-neutral-400 inline-block text-lg px-1 text-white dark:text-neutral-900  font-semibold hover:text-red-600 focus:outline-none transition duration-150 ease-in-out',
            ]"
            >{{ item.name }}</router-link
          >
          </div>
        </div>
        <div class="flex" >
    <DayNight />
        <router-link class="flex relative items-center" :to="'/carrinho'">
          <ShoppingCartIcon class="h-6 w-6 text-white dark:text-neutral-900 hover:text-red-600" />
          <span v-if="cart_quantity" class="absolute inset-0 mt-1 ml-4">
            <div class="animate-pulse inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
              {{cart_quantity}}
            </div>
          </span>
        </router-link>
      </div>
      <button
        class="text-white cursor-pointer text-xl leading-none px-3 py-1 block lg:hidden outline-none focus:outline-none"
        type="button" @click="toggleNavbar()">
        <MenuIcon class="flex h-6 w-6 text-white dark:text-neutral-900 sm:hidden" />
      </button>

      <div :class="{ hidden: !showMenu, flex: showMenu }" class="my-4 w-full flex-col space-y-4">
        <router-link v-for="item in navigation" :key="item.name" :to="item.to"
          active-class="text-white dark:text-neutral-900 inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out"
          :class="[
            this.$route.name === item.to.name
              ? 'text-white dark:text-neutral-900'
              : 'inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white dark:text-neutral-900 hover:text-red-600 focus:outline-none transition duration-150 ease-in-out',
          ]">{{ item.name }}</router-link>
      </div>
     </div>
  </nav>
  <router-view :key="$route.path"></router-view>
  <Footer></Footer>
</template>

<script>
import DayNight from "../components/DayNight.vue";
import scrollUp from "../components/scrollUp.vue";
import { MenuIcon, ShoppingCartIcon } from "@heroicons/vue/solid";
import NECMIconMono from "./NECMIconMono.vue";
import Footer from "./Footer.vue";

const navigation = [
  { name: "Sobre", to: { name: "About" } },
  { name: "Equipa", to: { name: "Team" } },
  { name: "Merch", to: { name: "Merch" } },
  { name: "Links", to: { name: "Links" } },
];
export default {
  mounted() {
    this.$store.commit('updateCartFromLocalStorage');
  },
  components: {
    MenuIcon,
    ShoppingCartIcon,
    NECMIconMono,
    Footer,
    scrollUp,
    DayNight,
  },
  name: "navbar",
  data() {
    return {
      showMenu: false,
    };
  },
  methods: {
    console(){
      console.log(localStorage.theme)
    },
    toggleNavbar: function () {
      this.showMenu = !this.showMenu;
    },
  },
  setup() {
    return {
      navigation,
    };
  },
  computed: {
    cart_quantity() {
      return this.$store.getters.cartItems.reduce((a, b) => a + (b.quantity), 0)
    }
  },
};
</script>
