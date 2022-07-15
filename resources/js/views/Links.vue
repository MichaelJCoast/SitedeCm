<template>
  <div class="mx-auto max-w-xs sm:max-w-xl">
    <div class="mt-8 grid grid-cols-1 gap-6">
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