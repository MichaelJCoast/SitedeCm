<template>
    <nav class="relative bg-black border-b border-neutral-700">
      <div class="container flex flex-wrap mx-auto px-8 py-2 md:px-14 justify-between">
        <div class="flex justify-between items-center h-16">
          <!-- Logo -->
          <router-link to="/">
            <NECMIconMono class="text-white fill-current h-16 w-auto" />
          </router-link>
          <div class="hidden space-x-4 sm:ml-10 sm:flex">
          <router-link
            v-for="item in navigation"
            :key="item.name"
            :to="item.to"
            active-class="cursor-pointer text-lg px-1 font-semibold text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out"
            :class="[
              this.$route.name === item.to.name
                ? 'text-white'
                : 'cursor-pointer text-lg px-1 text-white font-semibold hover:text-red-600 focus:outline-none transition duration-150 ease-in-out',
            ]"
            >{{ item.name }}</router-link
          >
          </div>
        </div>
        <button
          class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
          type="button"
          @click="toggleNavbar()"
        >
          <MenuIcon class="flex h-6 w-6 text-white sm:hidden" />
        </button>

        <div
        :class="{ hidden: !showMenu, flex: showMenu }"
        class="my-4 w-full flex-col space-y-4"
      >
        <router-link
            v-for="item in navigation"
            :key="item.name"
            :to="item.to"
            active-class="inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out"
            :class="[
              this.$route.name === item.to.name
                ? 'text-white'
                : 'inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out',
            ]"
            >{{ item.name }}</router-link>
      </div> 
      </div>
    </nav>
    <router-view :key="$route.path"></router-view>
    <Footer></Footer>
</template>

<script>
import { MenuIcon } from "@heroicons/vue/solid";
import NECMIconMono from "./NECMIconMono.vue";
import Footer from "./Footer.vue";

const navigation = [
  { name: "Equipa", to: { name: "Team" } },
  { name: "Links", to: { name: "Links" } },
];
export default {
  components: {
    MenuIcon,
    NECMIconMono,
    Footer,
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
    };
  },
};
</script>
