<template>
  <div>
    <nav
      class="relative flex flex-wrap items-center justify-between bg-black border-b border-zinc-700 mb-3"
    >
      <div
        class="container px-8 md:px-14 py-2 mx-auto flex flex-wrap items-center justify-between"
      >
        <div
          class="w-full relative flex px-4 justify-between lg:w-auto lg:space-x-8"
        >
          <!-- Logo -->
          <router-link to="/">
            <NECMIcon class="" />
          </router-link>
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
          <button
            class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
            type="button"
            v-on:click="toggleNavbar()"
          >
            <MenuIcon class="h-6 w-6 text-white" />
          </button>
        </div>

        <div
          v-bind:class="{ hidden: !showMenu, flex: showMenu }"
          class="lg:flex sm:flex-none items-center"
        >
        </div>
      </div>
    </nav>
    <router-view :key="$route.path"></router-view>
  </div>
</template>

<script>
import NECMIcon from "./NECMIcon.vue";

const navigation = [
  { name: "Equipa", to: { name: "Team" } },
  { name: "Links", to: { name: "Links" } },
];

export default {
  components: {
    NECMIcon,
  },
  name: "navbar",
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
