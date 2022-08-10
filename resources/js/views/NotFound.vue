<template>
    <div class="
    flex
    items-center
    justify-center
    w-screen
    h-screen
    bg-neutral-200
    dark:bg-neutral-900
  ">
        <div class="px-40 py-20 bg-neutral-900 dark:bg-neutral-200 rounded-md shadow-xl">
            <div class="flex flex-col items-center">
                <h1 class="font-bold text-sky-400 dark:text-sky-600 text-9xl">404</h1>

                <h6 class="mb-2 text-2xl font-bold text-center dark:text-neutral-800 text-neutral-200 md:text-3xl">
                    <span class="text-red-500">Oops!</span> A página que procuras não existe.
                </h6>

                <p class="mb-8 text-center text-neutral-400 dark:text-neutral-700 md:text-lg">
                    Este é um erro 404 o que significa que entraste num link não funcional ou introduziste um URL inválido.
                </p>
                <router-link class="underline font-semibold text-neutral-200 dark:text-neutral-900" to="/">Página Inicial</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
}
</script>

<style>
</style>