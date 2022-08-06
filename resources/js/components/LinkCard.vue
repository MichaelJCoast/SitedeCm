<template>
  <div class="p-6 border border-neutral-700 rounded-lg bg-black">
    <div class="flex items-center justify-center cursor-pointer">
      <a
        :href="link.link_to"
        class="text-xl font-semibold text-center text-gray-100 truncate capitalize"
        target="_blank"
      >
        {{ link.name }}
      </a>
    </div>
  </div>
</template>

<script setup>
const { link } = defineProps({
  link: Object,
});
</script>