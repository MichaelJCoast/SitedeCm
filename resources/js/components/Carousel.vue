<template>
  <swiper :autoplay="{
      delay: 5000,
      disableOnInteraction: false,
    }" 
    :centeredSlides="true"
    :spaceBetween="30"
    :watchSlidesProgress="true"
    :initialSlide="0"
    :slidesPerView="1.5" :loop="true" :pagination="{
    clickable: true,
  }" :navigation="false" :modules="modules">
    <swiper-slide v-for="(carousel_item, i) in carousel" :key="i">
      <a v-if="carousel_item.has_button"
        :href=carousel_item.router_link
        class="absolute text-xl sm:text-3xl text-white sm:text-gray-100 bottom-0 pb-6 left-0 right-0 sm:pb-4 sm:bottom-auto sm:right-auto sm:top-1/2 sm:left-28 font-bold max-w-lg sm:rounded-full sm:drop-shadow-lg bg-black bg-opacity-75 sm:bg-red-800 sm:hover:brightness-125 px-6 py-4 truncate">
        {{ carousel_item.title }}
      </a>
      <img class="sm:rounded-b-md" :src=carousel_item.image :alt="carousel_item.image + 'image'" />
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

  props: {
    carousel: Object,
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
