<template>
  <nav class="relative bg-white dark:bg-black">
    <div class="container flex flex-wrap mx-auto px-8 py-2 md:px-14 justify-between">
      <div class="flex justify-between items-center h-16">
        <!-- Logo -->
        <router-link to="/">
          <NECMIconMono class="text-neutral-900 dark:text-white fill-current h-16 w-auto" />
        </router-link>
        <div class="hidden space-x-4 sm:ml-10 lg:flex lg:flex-wrap -mb-px">
          <scrollUp />
          <router-link v-for="item in navigation" :key="item.name" :to="item.to" :class="[
            this.$route.name === item.to.name
              ? 'inline-block rounded-t-lg p-6 border-red-600 border-b-2 cursor-pointer text-lg px-1 font-semibold text-neutral-900 dark:text-white  hover:text-red-600 focus:outline-none transition duration-150 ease-in-out'
              : 'border-b-2 border-transparent p-6 hover:border-neutral-400 inline-block text-lg px-1 text-neutral-900 dark:text-white font-semibold hover:text-red-600 focus:outline-none transition duration-150 ease-in-out',
          ]">{{ item.name }}</router-link>
        </div>
      </div>
      <div class="hidden lg:flex">
        <button type="button" class="flex relative items-center" aria-label="Modo Noturno Toggle">
          <DayNight class="text-yellow-500 h-6 w-6 mr-2 dark:text-neutral-200" />
        </button>
        <router-link class="flex relative items-center" :to="'/carrinho'" aria-label="Carrinho">
          <ShoppingCartIcon
            class="h-6 w-6 text-neutral-900 dark:text-white hover:text-red-600 dark:hover:text-red-600" />
          <span v-if="cart_quantity" class="absolute inset-0 mt-1 ml-4">
            <div
              class="animate-pulse inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
              {{ cart_quantity }}
            </div>
          </span>
        </router-link>
      </div>
      <button class="cursor-pointer text-xl leading-none px-3 py-1 block lg:hidden outline-none focus:outline-none"
        type="button" aria-label="Menu Mobile" @click="toggleNavbar()">
        <component :is="showMenu ? 'XIcon' : 'MenuIcon'" class="flex h-6 w-6 text-neutral-900 dark:text-neutral-200 lg:hidden"></component>
      </button>
      <transition enter-active-class="transition duration-100 ease-out" enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100" leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">

        <div v-if="showMenu" :class="{ hidden: !showMenu, flex: showMenu }"
          class="my-4 w-full flex-col space-y-4 text-neutral-900 dark:text-neutral-200">
          <router-link @click="toggleNavbar()" v-for="item in mobileNavigation" :key="item.name" :to="item.to"
            :icon="item.icon"
            class="inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 hover:text-red-600 focus:outline-none transition duration-150 ease-in-out">
            <component class="h-6 w-6 mr-4" :is="item.icon"></component>{{ item.name }}
          </router-link>
          <div class="mx-auto border-t mt-1 mb-2 w-full border-neutral-500"></div>
          <button type="button" class="flex justify-center items-center">
            <DayNight class="text-yellow-500 h-6 w-6 dark:text-neutral-200" />
          </button>
        </div>

      </transition>
    </div>
  </nav>
  <router-view :key="$route.path"></router-view>
  <Footer></Footer>
</template>

<script>
import DayNight from "../components/DayNight.vue";
import scrollUp from "../components/scrollUp.vue";
import { MenuIcon, ShoppingCartIcon, InformationCircleIcon, UserGroupIcon, ShoppingBagIcon, LinkIcon, XIcon } from "@heroicons/vue/solid";
import NECMIconMono from "./NECMIconMono.vue";
import Footer from "./Footer.vue";

const navigation = [
  { name: "Sobre", to: { name: "About" } },
  { name: "Equipa", to: { name: "Team" } },
  { name: "Merch", to: { name: "Merch" } },
  { name: "Links", to: { name: "Links" } },
];

const mobileNavigation = [
  { name: "Sobre", to: { name: "About" }, icon: InformationCircleIcon },
  { name: "Equipa", to: { name: "Team" }, icon: UserGroupIcon },
  { name: "Merch", to: { name: "Merch" }, icon: ShoppingBagIcon },
  { name: "Links", to: { name: "Links" }, icon: LinkIcon },
  { name: "Carrinho", to: { name: "Cart" }, icon: ShoppingCartIcon },
];

export default {
  mounted() {
    this.$store.commit('updateCartFromLocalStorage');
  },
  components: {
    MenuIcon,
    XIcon,
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
    toggleNavbar: function () {
      this.showMenu = !this.showMenu;
    },
  },
  setup() {
    return {
      navigation,
      mobileNavigation
    };
  },
  computed: {
    cart_quantity() {
      return this.$store.getters.cartItems.reduce((a, b) => a + (b.quantity), 0)
    }
  },
};
</script>
