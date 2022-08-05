<template>
  <swiper :autoplay="{
      delay: 5000,
      disableOnInteraction: false,
    }" 
    :slidesPerView="1" :loop="true" :pagination="{
    clickable: true,
  }" :navigation="false" :modules="modules" class="swiper-slide">
    <swiper-slide v-for="carousel_item in carousel" :key="carousel_item">
      <router-link v-if="carousel_item.has_button"
        :to=carousel_item.url
        class="absolute text-xl sm:text-3xl text-white sm:text-gray-100 bottom-0 pb-6 left-0 right-0 sm:pb-4 sm:bottom-auto sm:right-auto sm:top-1/2 sm:left-28 font-bold max-w-lg sm:rounded-2xl sm:drop-shadow-lg bg-black bg-opacity-75 sm:bg-red-500 sm:hover:bg-red-400 px-6 py-4 truncate">
        Sobre o NECM
      </router-link>
      <img class="sm:rounded-b-md" :src=carousel_item.landscaped_image alt="" />
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
.swiper {
  width: 60%;
}

@media only screen and (max-width: 810px) {
  .swiper {
    width: 100%;
  }
}

.swiper-slide img {
  display: block;
  width: 100%;
  object-fit: cover;
}

.swiper-pagination-bullet {
  background: #525252;
  border-radius: 0;
  opacity: 100;
}

.swiper-pagination-bullet-active {
  background: #fff;
}

</style>
