<template>
  <swiper :autoplay="{
      delay: 5000,
      disableOnInteraction: false,
    }" 
    :slidesPerView="1" :loop="true" :pagination="{
    clickable: true,
  }" :navigation="false" :modules="modules" class="swiper-slide">
    <swiper-slide>
      <router-link
        to="/sobre"
        class="absolute text-xl sm:text-3xl text-white sm:text-gray-100 bottom-0 pb-6 left-0 right-0 sm:pb-4 sm:bottom-auto sm:right-auto sm:top-1/2 sm:left-28 font-bold max-w-lg sm:rounded-2xl sm:drop-shadow-lg bg-black bg-opacity-75 sm:bg-red-500 sm:hover:bg-red-400 px-6 py-4 truncate">
        Sobre o NECM
      </router-link>
      <img class="sm:rounded-b-md" src="https://www.upload.ee/image/14330108/carousel.png" alt="" />
    </swiper-slide>
    <swiper-slide>
      <h1
        class="absolute text-xl sm:text-5xl text-white bottom-0 pb-6 left-0 right-0 sm:pb-4 sm:bottom-auto sm:right-auto sm:top-1/2 sm:left-28 font-bold max-w-lg bg-black bg-opacity-75 px-6 py-4 truncate">
        Título bué bué bué bué bué bué bué grande
      </h1>
      <img class="sm:rounded-b-md"
        src="https://blz-contentstack-images.akamaized.net/v3/assets/blta8f9a8e092360c6c/blt3deb8874aa5806fc/62ccc0220f8fa6114e1c7c84/HS_23p6_MaCN_MegaBundle_Blizzardcom_Desktop-1600x720_VersionB_JL01.jpg?format=webply&quality=80&auto=webp"
        alt="" />
    </swiper-slide>
    <swiper-slide>
      <h1
        class="absolute text-xl sm:text-5xl text-white bottom-0 pb-6 left-0 right-0 sm:pb-4 sm:bottom-auto sm:right-auto sm:top-1/2 sm:left-28 font-bold max-w-lg bg-black bg-opacity-75 px-6 py-4">
        Slide #3
      </h1>
      <img class="sm:rounded-b-md"
        src="https://blz-contentstack-images.akamaized.net/v3/assets/blta8f9a8e092360c6c/blt3deb8874aa5806fc/62ccc0220f8fa6114e1c7c84/HS_23p6_MaCN_MegaBundle_Blizzardcom_Desktop-1600x720_VersionB_JL01.jpg?format=webply&quality=80&auto=webp"
        alt="" />
    </swiper-slide>
  </swiper>
</template>

<script>
import { Swiper, SwiperSlide } from "swiper/vue";

import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";

import { Autoplay, Pagination, Navigation } from "swiper";

export default {
  components: {
    Swiper,
    SwiperSlide,
  },

  setup() {
    return {
      modules: [Autoplay, Pagination, Navigation],
    };
  },
};
</script>

<style type="text/css">

.swiper-pagination-bullet {
  background: #525252;
  border-radius: 0;
  opacity: 100;
}

.swiper-pagination-bullet-active {
  background: #fff;
}

</style>
