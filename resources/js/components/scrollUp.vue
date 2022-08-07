<template>
      <button v-show="scY > 100" @click="toTop" title="Go to top"
        class="fixed z-10 p-3 bg-gray-100 bg-opacity-25 rounded-full shadow-md bottom-10 right-10 animate-bounce">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
            </path>
        </svg>
    </button>
</template>

<script>

export default {
  components: {
  },
  data(){
      return{
        scTimer: 0,
        scY: 0,
      }
  },
    methods: {
        handleScroll: function () {
        if (this.scTimer) return;
        this.scTimer = setTimeout(() => {
          this.scY = window.scrollY;
          clearTimeout(this.scTimer);
          this.scTimer = 0;
        }, 100);
    },
    toTop: function () {
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      }
    },
    mounted() {
      window.addEventListener('scroll', this.handleScroll);
    },
};
</script>
<style>
html {
  scroll-behavior: smooth;
}
</style>