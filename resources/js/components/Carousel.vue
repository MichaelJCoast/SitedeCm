<template>
  <flickity class="flickity" ref="flickity" :options="flickityOptions">
    <div class="carousel-cell px-4 shadow-lg">
      <h1 class="absolute text-5xl text-white top-1/2 left-28 font-bold drop-shadow-xl">Sobre o NECM</h1>
      <img class="rounded-b-md" src="https://www.upload.ee/image/14328132/necm.png" alt="">
      </div>
    <div class="carousel-cell px-4 shadow-lg">
      <h1 class="absolute text-5xl text-white top-1/2 left-28 font-bold drop-shadow-xl">Slide #2</h1>
      <img class="rounded-b-md" src="https://blz-contentstack-images.akamaized.net/v3/assets/blta8f9a8e092360c6c/blt3deb8874aa5806fc/62ccc0220f8fa6114e1c7c84/HS_23p6_MaCN_MegaBundle_Blizzardcom_Desktop-1600x720_VersionB_JL01.jpg?format=webply&quality=80&auto=webp" alt="">
    </div>
    <div class="carousel-cell px-4 shadow-lg">
      <h1 class="absolute text-5xl text-white top-1/2 left-28 font-bold drop-shadow-xl">Slide #3</h1>
      <img class="rounded-b-md" src="https://blz-contentstack-images.akamaized.net/v3/assets/blta8f9a8e092360c6c/blt3deb8874aa5806fc/62ccc0220f8fa6114e1c7c84/HS_23p6_MaCN_MegaBundle_Blizzardcom_Desktop-1600x720_VersionB_JL01.jpg?format=webply&quality=80&auto=webp" alt="">
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
    }
  }
};


</script>

<style scoped>

</style>