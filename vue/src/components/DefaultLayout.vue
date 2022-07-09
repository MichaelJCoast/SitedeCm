<template>
  <div>
    <nav x-data="{ open: false }" class="bg-black border-b border-zinc-700">
      <!-- Primary Navigation Menu -->
      <div class="container mx-auto px-8 md:px-14 py-2">
        <div class="flex justify-between h-16">
          <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
              <router-link to="/">
                <svg
                  class="text-white fill-current h-14 w-14"
                  viewBox="0 0 54 54"
                >
                  <path
                    d="m49.468 8.817 4.529.04-.007-1.694-4.522 1.654Zm4.522-2.063-5.123 1.87L53.99.496v6.258ZM53.833 0l-5.419 8.598L43.94 0h9.893ZM43.492 0l4.494 8.631-7.9-2.996V.017L43.491 0Zm-3.4 13.854V6.038l7.89 2.996-7.89 4.82Zm.578.12 7.629-4.66 1.397 4.706-9.026-.046Zm13.33 0h-3.855l-1.411-4.777h5.252L54 13.974ZM43.808 47.325l-12.059-6.274 5.98.333 6.079 5.941Zm-6.497-6.354-5.803-.333 3.4-2.03 2.403 2.363Zm-2.686-2.63-3.596 2.144-.636-6.288 4.232 4.144ZM24.246 28.19l5.708 5.579.68 6.733L4.702 29.625l19.378-1.422.166-.013Zm-.367-.36L4.57 29.24l11.984-8.562 7.326 7.154Zm-7.605-7.429L4.08 29.119 3.4 11.4l8.115 4.328 4.76 4.673ZM0 4.487l10.505 10.272-7.323-3.911L0 12.432V4.487Zm0 8.378 2.992-1.485.68 17.858L0 28.426v-15.56Zm0 15.96 3.468.763L0 32.49v-3.664Zm3.553 1.19L.013 44.992V33.01l3.54-2.996ZM.034 46.693 4.029 29.76 30.366 40.81.017 53.89l.017-7.196Zm.734 7.3L30.55 41.157l-4.08 12.835H.77Zm26.13 0 4.08-12.902 13.778 7.173L50.614 54l-23.716-.007Zm-3.175-40.986 11.018-6.28-.003-6.715-6.84.004-4.175 12.991Zm30.257 32.68v-2.602l-1.976.901 1.976 1.701ZM23.23 13.75l-3.488 2.387 4.375 4.294-.887-6.68Zm12.47 5.32-.959-.01v-.59l-11.113-4.726.945 7.13 5.718 5.618 19.201-1.514L35.7 19.07Zm-.959-1.022V7.176l-10.923 6.225 10.923 4.647Zm16.869 1.025-14.931-.003 13.456 5.761 1.475-5.758Zm-1.985 6.281-18.967 1.498 7.523 7.383 11.444-8.881Zm1.098-.899 3.26-2.829-.01-2.55-1.958-.003-1.404 5.479.112-.097Zm3.236-2.29-3.274 2.84.667.15 2.607.582v-3.572ZM10.03 6.597l6.429 6.308 6.065.273-12.494-6.58Zm6.84 6.714 2.587 2.55 3.332-2.28-5.919-.27Zm33.232 12.17-11.637 9.027 4.84 4.76 8.12 4.337L50.1 25.48Zm1.36 18.576-7.164-3.818 9.693 9.517-.007-3.548-2.522-2.15ZM27.483.017 3.328.027 9.07 5.659l14.197 7.476L27.483.017Zm23.002 25.34 1.343 18.288 2.148-.986.01-16.52-3.501-.782Z"
                  />
                </svg>
              </router-link>
            </div>
            <!-- Navigation Links -->
            <div class="flex justify-between">
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
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
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
              <router-link to="/register">Register</router-link>
              <router-link to="/login">Login</router-link>
            </div>
            </div>
          </div>
        </div>
        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden text-white">
          <button
            @click="open = !open"
            class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none transition duration-150 ease-in-out"
          >
            <svg
              class="h-6 w-6"
              stroke="currentColor"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                :class="{ hidden: open, 'inline-flex': !open }"
                class="inline-flex"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
              <path
                :class="{ hidden: !open, 'inline-flex': open }"
                class="hidden"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>
      </div>

      <!-- Responsive Navigation Menu -->
      <div :class="{ block: open, hidden: !open }" class="hidden sm:hidden">
        <div class="pt-2 space-y-1">
          <router-link
            v-for="item in navigation"
            :key="item.name"
            :to="item.to"
            active-class="bg-gray-900 text-white"
            :class="[
              this.$route.name === item.to.name
                ? ''
                : 'inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out',
            ]"
            >{{ item.name }}</router-link
          >
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-zinc-700">
          <div class="px-4">
            <div class="font-medium text-base text-white">User</div>
            <div class="flex flex-wrap space-x-1"></div>
            <div class="font-medium text-sm text-gray-500">E-mail</div>
          </div>
        </div>
      </div>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script>
import {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
} from "@headlessui/vue";
import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter } from "vue-router";

const navigation = [
  { name: 'Home', to: { name: "Home" } },
]

export default {
  components: {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
  },

  setup() {
    const store = useStore();
    const router = useRouter();

    function logout() {
      store.commit('logout');
      router.push({
        name: 'Login',
      });
    }

    return {
      user: computed(() => store.state.user.data),
      navigation,
      logout,
    };
  }
};
</script>
