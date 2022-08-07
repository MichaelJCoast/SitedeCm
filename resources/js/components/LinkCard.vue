<template>
      <a
        :href="link.link_to"
        class="text-xl font-semibold text-center text-gray-100 dark:text-gray-900 truncate capitalize"
        target="_blank"
      >
  <div class="p-6 border border-neutral-700 dark:border-neutral-400 rounded-full bg-black dark:bg-white hover:bg-opacity-40">
    <div class="w-16 h-16 mt-[-18px] ml-[-16px] absolute rounded-full border border-neutral-700 dark:border-neutral-400">
      <img src="https://img.icons8.com/plasticine/344/twitter.png">
    </div>
    <div class="flex items-center justify-center cursor-pointer">
        {{ link.name }}
    </div>
  </div>
  </a>

</template>

<script setup>
const { link } = defineProps({
  link: Object,
});
</script>