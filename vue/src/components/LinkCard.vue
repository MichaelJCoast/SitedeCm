<template>
  <div class="p-6 border-l-4 border-red-600 rounded-lg bg-gray-50">
    <div class="flex items-center justify-center cursor-pointer">
      <a
        :href="link.link_to"
        class="text-xl font-semibold text-center text-black"
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
