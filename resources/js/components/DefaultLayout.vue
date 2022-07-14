<template>
  <div>
    <nav class="flex bg-black border-b border-neutral-700 mb-3">
      <div class="container flex mx-auto px-8 py-2 md:px-14">
        <div class="flex justify-between items-center h-16">
          <!-- Logo -->
          <router-link to="/">
            <NECMIcon class="text-white fill-current h-14 w-14" />
          </router-link>
          <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex">
          <router-link
            v-for="item in navigation"
            :key="item.name"
            :to="item.to"
            active-class="inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out"
            :class="[
              this.$route.name === item.to.name
                ? 'border-b-2 border-red-600'
                : 'inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out',
            ]"
            >{{ item.name }}</router-link
          >
          </div>
        </div>
        <button
          class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
          type="button"
          v-on:click="toggleNavbar()"
        >
          <MenuIcon class="flex h-6 w-6 text-white sm:hidden" />
        </button>

        <div
          v-bind:class="{ hidden: !showMenu, flex: showMenu }"
          class="lg:flex sm:flex-none items-center"
        ></div>
      </div>
    </nav>
    <router-view :key="$route.path"></router-view>
  </div>
</template>

<script>
import { MenuIcon } from "@heroicons/vue/solid";
import NECMIcon from "./NECMIcon.vue";

const navigation = [
  { name: "Equipa", to: { name: "Team" } },
  { name: "Links", to: { name: "Links" } },
];
export default {
  components: {
    MenuIcon,
    NECMIcon,
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
