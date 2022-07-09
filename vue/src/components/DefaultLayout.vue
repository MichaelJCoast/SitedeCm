<template>
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
<<<<<<< HEAD
          <NECMIcon class=""/>
=======
          <svg class="text-white fill-current h-14 w-14" viewBox="0 0 54 54">
            <path
              d="m49.468 8.817 4.529.04-.007-1.694-4.522 1.654Zm4.522-2.063-5.123 1.87L53.99.496v6.258ZM53.833 0l-5.419 8.598L43.94 0h9.893ZM43.492 0l4.494 8.631-7.9-2.996V.017L43.491 0Zm-3.4 13.854V6.038l7.89 2.996-7.89 4.82Zm.578.12 7.629-4.66 1.397 4.706-9.026-.046Zm13.33 0h-3.855l-1.411-4.777h5.252L54 13.974ZM43.808 47.325l-12.059-6.274 5.98.333 6.079 5.941Zm-6.497-6.354-5.803-.333 3.4-2.03 2.403 2.363Zm-2.686-2.63-3.596 2.144-.636-6.288 4.232 4.144ZM24.246 28.19l5.708 5.579.68 6.733L4.702 29.625l19.378-1.422.166-.013Zm-.367-.36L4.57 29.24l11.984-8.562 7.326 7.154Zm-7.605-7.429L4.08 29.119 3.4 11.4l8.115 4.328 4.76 4.673ZM0 4.487l10.505 10.272-7.323-3.911L0 12.432V4.487Zm0 8.378 2.992-1.485.68 17.858L0 28.426v-15.56Zm0 15.96 3.468.763L0 32.49v-3.664Zm3.553 1.19L.013 44.992V33.01l3.54-2.996ZM.034 46.693 4.029 29.76 30.366 40.81.017 53.89l.017-7.196Zm.734 7.3L30.55 41.157l-4.08 12.835H.77Zm26.13 0 4.08-12.902 13.778 7.173L50.614 54l-23.716-.007Zm-3.175-40.986 11.018-6.28-.003-6.715-6.84.004-4.175 12.991Zm30.257 32.68v-2.602l-1.976.901 1.976 1.701ZM23.23 13.75l-3.488 2.387 4.375 4.294-.887-6.68Zm12.47 5.32-.959-.01v-.59l-11.113-4.726.945 7.13 5.718 5.618 19.201-1.514L35.7 19.07Zm-.959-1.022V7.176l-10.923 6.225 10.923 4.647Zm16.869 1.025-14.931-.003 13.456 5.761 1.475-5.758Zm-1.985 6.281-18.967 1.498 7.523 7.383 11.444-8.881Zm1.098-.899 3.26-2.829-.01-2.55-1.958-.003-1.404 5.479.112-.097Zm3.236-2.29-3.274 2.84.667.15 2.607.582v-3.572ZM10.03 6.597l6.429 6.308 6.065.273-12.494-6.58Zm6.84 6.714 2.587 2.55 3.332-2.28-5.919-.27Zm33.232 12.17-11.637 9.027 4.84 4.76 8.12 4.337L50.1 25.48Zm1.36 18.576-7.164-3.818 9.693 9.517-.007-3.548-2.522-2.15ZM27.483.017 3.328.027 9.07 5.659l14.197 7.476L27.483.017Zm23.002 25.34 1.343 18.288 2.148-.986.01-16.52-3.501-.782Z"
            />
          </svg>
>>>>>>> 04a7b2c (Front-end updates to the default layout)
        </router-link>
        <router-link
                v-for="item in navigation"
                :key="item.name"
                :to="item.to"
                active-class="inline-flex cursor-pointer text-lg items-center px-1 pt-1 border-b-2 border-red-600 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out"
                :class="[
                  this.$route.name === item.to.name
                    ? ''
                    : 'inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out',
                ]"
                >{{ item.name }}</router-link
              >
        <button
          class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
          type="button"
          v-on:click="toggleNavbar()"
        >
<<<<<<< HEAD
          <MenuIcon class="h-6 w-6 text-white" />
=======
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16"
            />
          </svg>
>>>>>>> 04a7b2c (Front-end updates to the default layout)
        </button>
        
      </div>
      
      <div
        v-bind:class="{ hidden: !showMenu, flex: showMenu }"
<<<<<<< HEAD
        class="lg:flex sm:flex-none items-center"
      >
        <ul v-if="!isLogged" class="flex flex-col lg:flex-row list-none ml-auto sm:space-x-4">
=======
        class="lg:flex lg:flex-grow items-center"
      >
        <ul class="flex flex-col lg:flex-row list-none ml-auto space-x-4">
>>>>>>> 04a7b2c (Front-end updates to the default layout)
          <li class="nav-item">
            <router-link to="/register" class="inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out">Registo</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/login" class="inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out">Login</router-link>
          </li>
        </ul>
<<<<<<< HEAD
        
        <Menu v-if="isLogged" as="div" class="relative">
      <MenuButton class="flex items-center text-lg cursor-pointer font-semibold text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out"/>
    <MenuItems class="absolute cursor-pointer px-2 py-2 bg-zinc-900 ring-1 ring-black ring-opacity-5 space-y-2 text-gray-100 shadow-md rounded-md flex flex-col focus:outline-none w-44 origin-top-right right-0 z-50">
      <MenuItem v-slot="{ active }">
        <a class="flex items-center rounded-md focus:outline-none transition duration-150 ease-in-out px-2 py-2 leading-5"
        :class='{ "bg-zinc-700": active }'>
          <span><UserIcon class="h-4 w-4"/></span>
          <span class="ml-2">Perfil</span>
        </a>
      </MenuItem>
      <MenuItem v-slot="{ active }">
        <a @click="logout" class="flex items-center rounded-md focus:outline-none transition duration-150 ease-in-out px-2 py-2 leading-5"
        :class='{ "bg-zinc-700": active }'>
          <span><LogoutIcon class="h-4 w-4"/></span>
          <span class="ml-2">Log Out</span>
        </a>
      </MenuItem>
    </MenuItems>
  </Menu>

=======
>>>>>>> 04a7b2c (Front-end updates to the default layout)
      </div>
    </div>
  </nav>
</template>
<script>
<<<<<<< HEAD
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { MenuIcon, ChevronDownIcon, UserIcon, LogoutIcon } from '@heroicons/vue/solid';
=======
>>>>>>> 04a7b2c (Front-end updates to the default layout)
import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter } from "vue-router";
import NECMIcon from "./NECMIcon.vue";

const navigation = [{ name: "Home", to: { name: "Home" } }];

export default {
<<<<<<< HEAD
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
=======
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
    const store = useStore();
    const router = useRouter();

    function logout() {
      store.commit("logout");
      router.push({
        name: "Login",
      });
    }

>>>>>>> 04a7b2c (Front-end updates to the default layout)
    return {
      isLogged: this.checkIfIsLoggedIn(),
      userName: this.getUserName(),
      showMenu: false,
    };
  },
<<<<<<< HEAD
  methods: {
    toggleNavbar: function () {
      this.showMenu = !this.showMenu;
    },
    checkIfIsLoggedIn: function () {
    const store = useStore();
    if (store.state.user.token) {
      return true;
    }
    else {
      return false;
    }
  },
  getUserName: function () {
    const store = useStore();
    if (store.state.user.token) {
      return store.state.user.name;
    }
    else {
      return "";
    }
  },
  },
};
=======
};
</script>
>>>>>>> 04a7b2c (Front-end updates to the default layout)
