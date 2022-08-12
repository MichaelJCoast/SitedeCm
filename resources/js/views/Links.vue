<template>
  <div class="min-h-screen mx-auto w-[80%] sm:sm:w-[80%] md:w-[80%] lg:w-[60%] xl:w-[50%]">
    <div class="mt-8 grid grid-cols-1 gap-6">
      <LinkCard v-for="link in links" :key="link.id" :link="link" />
    </div>
  </div>
</template>

<script>
import NECMIconMono from "../components/NECMIconMono.vue";
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
  components: { 
    LinkCard,
    NECMIconMono,
   },
};
</script>
