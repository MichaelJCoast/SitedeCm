<template>
  <flickity class="flickity" ref="flickity" :options="flickityOptions">
    <div class="carousel-cell sm:px-4 shadow-lg">
      <h1 class="absolute text-xl sm:text-5xl text-white bottom-0 left-0 right-0 sm:bottom-auto sm:right-auto sm:top-1/2 sm:left-28 font-bold max-w-lg bg-black bg-opacity-75 px-6 py-4 truncate">Sobre o NECM</h1>
      <img class="sm:rounded-b-md" src="https://www.upload.ee/image/14328132/necm.png" alt="">
      </div>
    <div class="carousel-cell sm:px-4 shadow-lg">
      <h1 class="absolute text-xl sm:text-5xl text-white bottom-0 left-0 right-0 sm:bottom-auto sm:right-auto sm:top-1/2 sm:left-28 font-bold max-w-lg bg-black bg-opacity-75 px-6 py-4 truncate">Título bué bué bué bué bué bué bué grande</h1>
      <img class="sm:rounded-b-md" src="https://blz-contentstack-images.akamaized.net/v3/assets/blta8f9a8e092360c6c/blt3deb8874aa5806fc/62ccc0220f8fa6114e1c7c84/HS_23p6_MaCN_MegaBundle_Blizzardcom_Desktop-1600x720_VersionB_JL01.jpg?format=webply&quality=80&auto=webp" alt="">
    </div>
    <div class="carousel-cell sm:px-4 shadow-lg">
      <h1 class="absolute text-xl sm:text-5xl text-white bottom-0 left-0 right-0 sm:bottom-auto sm:right-auto sm:top-1/2 sm:left-28 font-bold max-w-lg bg-black bg-opacity-75 px-6 py-4">Slide #3</h1>
      <img class="sm:rounded-b-md" src="https://blz-contentstack-images.akamaized.net/v3/assets/blta8f9a8e092360c6c/blt3deb8874aa5806fc/62ccc0220f8fa6114e1c7c84/HS_23p6_MaCN_MegaBundle_Blizzardcom_Desktop-1600x720_VersionB_JL01.jpg?format=webply&quality=80&auto=webp" alt="">
    </div>
</flickity>
</template>

<script>
import Flickity from 'vue-flickity';

export default {
  components: {
    Flickity
  },

  data() {
    return {
      flickityOptions: {
        initialIndex: 0,
        prevNextButtons: false,
        pageDots: false,
        wrapAround: true,
        resize: false
        
        // any options from Flickity can be used
      }
    }
  },
  
  methods: {
    next() {
      this.$refs.flickity.next();
    },
    
    previous() {
      this.$refs.flickity.previous();
    },
  }
};


</script>

<style scoped>

</style>