<template>
  <div class="container min-h-screen mx-auto mb-6 lg:mt-6 text-white">
    A tua encomenda foi confirmada com sucesso!
  </div>
</template>

<script>
import { useStore } from "vuex";
import { useRoute } from "vue-router";
export default {
  created() {
    const route = useRoute();
    const store = useStore();
    
    const queryString = window.location.href;
    const queryStringArray = queryString.split("/");
    const queryStringLastPart = queryStringArray[queryStringArray.length - 1];

    store.dispatch("verifyOrder", queryStringLastPart);
  }
}
</script>