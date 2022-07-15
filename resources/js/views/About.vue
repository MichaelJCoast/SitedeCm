<template>
  <div class="container min-h-screen my-6 mx-auto px-8 md:px-14">
    <h1
      class="text-white text-center uppercase font-black drop-shadow-lg text-3xl sm:text-6xl"
    >
      Bem-vind@ a CM
    </h1>
    <div class="mx-auto border-t-4 mt-1 mb-2 w-48 border-red-500"></div>
    <p class="text-white text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed arcu non neque ornare elementum. Duis ut mi ullamcorper, fringilla nunc sit amet, placerat est. Etiam venenatis viverra dolor a mattis. Quisque hendrerit mauris nec elementum feugiat. Donec dignissim nec orci ac aliquet. Donec eget urna libero. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas auctor sem at mauris lobortis auctor vel ut erat. Proin eget tellus condimentum, fringilla dui eu, tempus arcu. Sed scelerisque placerat mauris tincidunt aliquet. Maecenas lacus justo, lobortis at erat ac, condimentum dignissim nunc. Sed lectus arcu, suscipit at odio ac, dapibus ornare libero. </p>
    <!-- Quem Somos Content -->
    <div class="mt-4">
    <h1
      class="text-white text-center capitalize font-semibold text-2xl sm:text-5xl">
        Núcleo
    </h1>
    <p class="text-white text-justify mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed arcu non neque ornare elementum. Duis ut mi ullamcorper, fringilla nunc sit amet, placerat est. Etiam venenatis viverra dolor a mattis. Quisque hendrerit mauris nec elementum feugiat. Donec dignissim nec orci ac aliquet. Donec eget urna libero. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas auctor sem at mauris lobortis auctor vel ut erat. Proin eget tellus condimentum, fringilla dui eu, tempus arcu. Sed scelerisque placerat mauris tincidunt aliquet.</p>
    </div>
    <div class="w-full px-4 mt-4">
        <h1
      class="text-white text-center capitalize font-semibold text-2xl sm:text-5xl">
        FAQ
    </h1>
    <div class="mx-auto w-full max-w-screen rounded-2xl mt-4 p-2">
      <Disclosure v-slot="{ open }">
        <DisclosureButton
          class="flex w-full justify-between border-b border-neutral-700 px-4 py-2 text-left text-lg font-medium text-neutral-200 hover:text-white focus:outline-none focus-visible:ring focus-visible:ring-red-500 focus-visible:ring-opacity-75"
        >
          <span>Quem criou este website?</span>
          <ChevronUpIcon
            :class="open ? 'rotate-180 transform' : ''"
            class="h-5 w-5 text-neutral-200 transition-transform"
          />
        </DisclosureButton>
        <DisclosurePanel class="px-4 pt-4 pb-2 text-lg text-neutral-200">
          If you're unhappy with your purchase for any reason, email us within
          90 days and we'll refund you in full, no questions asked.
        </DisclosurePanel>
      </Disclosure>
      <Disclosure as="div" class="mt-2" v-slot="{ open }">
        <DisclosureButton
          class="flex w-full justify-between border-b border-neutral-700 px-4 py-2 text-left text-lg font-medium text-neutral-200 hover:text-white focus:outline-none focus-visible:ring focus-visible:ring-red-500 focus-visible:ring-opacity-75"
        >
          <span>Quando foi fundado o Núcleo?</span>
          <ChevronUpIcon
            :class="open ? 'rotate-180 transform' : ''"
            class="h-5 w-5 text-neutral-200 transition-transform"
          />
        </DisclosureButton>
        <DisclosurePanel class="px-4 pt-4 pb-2 text-lg text-neutral-200">
          If you're unhappy with your purchase for any reason, email us within
          90 days and we'll refund you in full, no questions asked.
        </DisclosurePanel>
      </Disclosure>
    </div>
  </div>
  </div>
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronUpIcon } from '@heroicons/vue/solid'
</script>
