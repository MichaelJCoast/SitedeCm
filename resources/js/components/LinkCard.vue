<template>
  <a :href="link.link_to" class="text-xl font-semibold text-center text-neutral-200 dark:text-neutral-900 truncate capitalize"
    target="_blank">
    <div
      class="p-6 border border-neutral-700 dark:border-neutral-400 rounded-full bg-black dark:bg-neutral-200 hover:bg-opacity-40">
      <div class="flex items-center cursor-pointer">
          <font-awesome-icon class="h-10 w-10 mr-auto" :icon="link.link_icon" />
        <p class="flex-1">{{ link.name }}</p>
      </div>
    </div>
  </a>

</template>

<script setup>
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'

library.add(fab, fas, far)

const { link } = defineProps({
  link: Object,
});
</script>