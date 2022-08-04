<template>
  <div class="container min-h-screen mx-auto mb-6 lg:mt-6 text-white">
    Verified.
  </div>
</template>

<script>
import { useStore } from "vuex";
import { useRoute } from "vue-router";
export default {
  created() {
    const route = useRoute();
    const store = useStore();
    store.dispatch("verifyOrder", route.params.verify_token);
  }
}
</script>