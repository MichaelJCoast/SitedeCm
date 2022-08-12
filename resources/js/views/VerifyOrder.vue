<template>
    <div class="container min-h-screen mx-auto lg:mt-6 px-8 md:px-14 text-neutral-900 dark:text-white">
      <p v-if="!checkExpirationDate">A tua encomenda foi confirmada com sucesso!</p>
      <p v-else>Link Expirado.</p>
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
   
      store.dispatch("verifyOrder", queryStringLastPart).catch(() => {
       this.$router.push({name: "Home"});
    });
  },
  data(){
      const queryString = window.location.href;
      const queryStringArray = queryString.split("/");
      const queryStringLastPart = queryStringArray[queryStringArray.length - 1];
      const expirationDate = queryStringLastPart.split("?")[1].split("=")[1].split("%20")[0];
   

      let today = new Date();
      const dd = String(today.getDate()).padStart(2, '0');
      const mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      const yyyy = today.getFullYear();
      today =  yyyy + '-' +mm +'-' + dd;
      let checkExpirationDate = today >= expirationDate;
      return {
        checkExpirationDate
      }
  }
  }
  

</script>