<template>
  <div>
    <div>
      <NECMIcon class="mx-auto"/>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
        Login
      </h2>
      <p class="mt-2 text-center text-sm text-white">
        Ou
        {{ " " }}
        <router-link
          :to="{ name: 'Register' }"
          class="font-medium text-red-600 hover:text-red-500"
        >
          regista-te
        </router-link>
      </p>
    </div>
    <form class="mt-8 space-y-6" @submit="login">
    <Alert v-if="errorMsg">
    
      <span>{{ errorMsg }}</span>
      <span
        @click="errorMsg = ''"
        class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>
      </span>
    </Alert>
      <input type="hidden" name="remember" value="true" />
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="email-address" class="sr-only">Endereço de E-mail</label>
          <input
            id="email-address"
            name="email"
            type="email"
            autocomplete="email"
            required=""
            v-model="user.email"
            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm"
            placeholder="Endereço de E-mail"
          />
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input
            id="password"
            name="password"
            type="password"
            autocomplete="current-password"
            required=""
            v-model="user.password"
            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm"
            placeholder="Password"

          />
        </div>
      </div>
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember-me" name="remember-me" type="checkbox" v-model="user.remember"
          class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
          <label for="remember-me" class="ml-2 block text-sm text-white">
             Lembrar-me
            </label>
        </div>
      </div>
        <button
          type="submit"
          class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
        >
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <LockClosedIcon
              class="h-5 w-5 text-red-500 group-hover:text-red-400"
              aria-hidden="true"
            />
          </span>
          Login
        </button>
    </form>
    </div>
    </template>
<script setup>
import { LockClosedIcon } from '@heroicons/vue/solid';
import { ExclamationIcon } from '@heroicons/vue/outline';
import store from "../store";
import { useRouter } from "vue-router";
import { ref } from 'vue';
import Alert from "../components/Alert.vue";
import NECMIcon from "../components/NECMIcon.vue";

const router = useRouter();

const user = {
  email: '',
  password: '',
  remember: false
}

let errorMsg = ref('');

function login(ev) {
  ev.preventDefault();
  store.dispatch('login', user)
    .then(() => {
      router.push({name: 'Home'})
    })
    .catch(err => {
      errorMsg.value = err.response.data.error;
    })
}
</script>
