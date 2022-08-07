<template>
    <footer class="bg-black dark:bg-white border-t border-neutral-700">
        <div class="container px-8 md:px-14 mx-auto py-8">
            <div class="flex justify-center items-center space-x-1">
                <p class="text-center text-xs text-white dark:text-black">Criado com </p>
                <HeartIcon class="h-6 w-auto text-red-500"/>
                <p class="text-center text-xs text-white dark:text-black">pelo Departamento de Tecnologia</p>
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