<template>
<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit="updateProfile">
<div class="identity-input mb-4">
          <label
            for="identity"
            class="block text-gray-700 text-sm font-bold mb-2"
          >
            Email</label
          >
          <input
            id="identity"
            class="shadow appearance-none borderrounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            type="email"
            aria-describedby="emailHelp"
            v-model="user.email"
            :placeholder="user.email"
          />
          <span class="text-xs text-red-700" id="emailHelp"></span>
        </div>
        <div class="password-input mb-6">
          <label
            for="identity"
            class="block text-gray-700 text-sm font-bold mb-2"
            >Password</label
          >

          <input
            aria-describedby="passwordHelp"
            v-model="user.password"
            class="shadow appearance-none borderrounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            id="password"
            type="password"
            :placeholder="user.password"
          />

          <span class="text-xs text-red-700" id="passwordHelp"></span>
        </div>

        <div class="flex items-center justify-between">
          <button
            class="bg-blue-600 hover:bg-black text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
          >
            Atualizar dados
          </button>
          </div>
</form>
</template>

<script setup>
import { useStore } from "vuex";
import { computed } from "vue";

let user = {};

const store = useStore();

function updateProfile(ev) {
  ev.preventDefault();
  store.dispatch('updateProfile', user)
    .then(() => {
      user = computed(state.user.data);
    })
    .catch(err => {
      console.log(err);
    })
}
</script>