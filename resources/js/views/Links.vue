<template>
  <div class="min-h-screen mx-auto max-w-sm sm:max-w-xl">
    <h1 class="font-bold text-center text-5xl mt-6 text-white">Links</h1>
    <div class="mt-4 grid grid-cols-1 gap-6">
      <LinkCard v-for="link in links" :key="link.id" :link="link" />
    </div>
  </div>
</template>

<script>
import { useStore } from "vuex";
import { computed } from "vue";
import LinkCard from "../components/LinkCard.vue";
export default {
  setup() {
    const store = useStore();
    store.dispatch("getLinks");
    return {
      links: computed(() => store.state.links.data),
    };
  },
  components: { LinkCard },
};
</script>