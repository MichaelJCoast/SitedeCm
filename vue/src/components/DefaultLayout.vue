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
          <ul
            v-if="!isLogged"
            class="flex flex-col lg:flex-row list-none ml-auto sm:space-x-4"
          >
            <li class="nav-item">
              <router-link
                to="/register"
                class="inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out"
                >Registo</router-link
              >
            </li>
            <li class="nav-item">
              <router-link
                to="/login"
                class="inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out"
                >Login</router-link
              >
            </li>
          </ul>

          <Menu v-if="isLogged" as="div" class="relative">
            <MenuButton
              class="flex items-center text-lg cursor-pointer font-semibold text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out"
            >
              <span>{{ user.name }}</span>
              <ChevronDownIcon class="h-5 w-5 ml-2" />
            </MenuButton>
            <MenuItems
              class="absolute cursor-pointer px-2 py-2 bg-zinc-900 ring-1 ring-black ring-opacity-5 space-y-2 text-gray-100 shadow-md rounded-md flex flex-col focus:outline-none w-44 origin-top-right right-0 z-50"
            >
              <MenuItem v-slot="{ active }">
                <a
                  class="flex items-center rounded-md focus:outline-none transition duration-150 ease-in-out px-2 py-2 leading-5"
                  :class="{ 'bg-zinc-700': active }"
                >
                  <span><UserIcon class="h-4 w-4" /></span>
                  <span class="ml-2">Perfil</span>
                </a>
              </MenuItem>
              <MenuItem v-slot="{ active }">
                <a
                  @click="logout"
                  class="flex items-center rounded-md focus:outline-none transition duration-150 ease-in-out px-2 py-2 leading-5"
                  :class="{ 'bg-zinc-700': active }"
                >
                  <span><LogoutIcon class="h-4 w-4" /></span>
                  <span class="ml-2">Log Out</span>
                </a>
              </MenuItem>
            </MenuItems>
          </Menu>
        </div>
      </div>
    </nav>
    <router-view :key="$route.path"></router-view>
  </div>
</template>

<script>
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import {
  MenuIcon,
  ChevronDownIcon,
  UserIcon,
  LogoutIcon,
} from "@heroicons/vue/solid";
import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter } from "vue-router";
import NECMIcon from "./NECMIcon.vue";

const navigation = [
  { name: "Home", to: { name: "Home" } },
  { name: "Blog", to: { name: "Blog" } },
];

export default {
  components: {
    MenuIcon,
    ChevronDownIcon,
    NECMIcon,
    UserIcon,
    LogoutIcon,
    Menu,
    MenuButton,
    MenuItems,
    MenuItem,
  },
  name: "navbar",
  data() {
    return {
      isLogged: this.checkIfIsLoggedIn(),
      showMenu: false,
    };
  },
  methods: {
    toggleNavbar: function () {
      this.showMenu = !this.showMenu;
    },
    checkIfIsLoggedIn: function () {
      const store = useStore();
      if (store.state.user.token) {
        return true;
      } else {
        return false;
      }
    },
  },
  setup() {
    const store = useStore();
    const router = useRouter();

    function logout() {
      store.dispatch("logout").then(() => {
        router.go();
      });
    }

    store.dispatch("getUser");

    return {
      user: computed(() => store.state.user.data),
      navigation,
      logout,
    };
  },
};
</script>
