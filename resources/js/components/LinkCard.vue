<template>
  <a :href="link.link_to" class="text-xl font-semibold text-center text-neutral-900 dark:text-neutral-200 truncate capitalize"
    target="_blank">
    <div class="p-6 border border-neutral-400 dark:border-neutral-700 rounded-full bg-white dark:bg-black dark:hover:bg-opacity-40 hover:bg-opacity-40">
      <div class="flex items-center cursor-pointer">
          <font-awesome-icon class="h-10 w-10 absolute" v-if="link.link_icon !== null" :icon="link.link_icon" />
        <p class="sm:flex-1 ml-14 sm:-m-14 truncate sm:py-14">{{ link.name }}</p>
      </div>
    </div>
  </a>

</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'

library.add(fab, fas, far);

export default {
  props: {
    link: {
      type: Object,
    }
  },
  components: {
    FontAwesomeIcon
  },
}

</script>