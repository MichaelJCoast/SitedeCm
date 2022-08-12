<template>
    <footer class="bg-white mt-4 dark:bg-black border-t border-neutral-400 dark:border-neutral-700">
        <div class="container px-8 md:px-14 mx-auto py-8">
            <div class="flex justify-center items-center space-x-1">
                <p class="text-center text-xs text-neutral-900 dark:text-white">Criado com </p>
                <HeartIcon class="h-6 w-auto text-red-700"/>
                <p class="text-center text-xs text-neutral-900 dark:text-white">pelo teu Núcleo</p>
            </div>
            </div>
    </footer>
</template>

<script>
import { HeartIcon } from "@heroicons/vue/solid";

export default {
  components: {
    HeartIcon
  },
};
</script>