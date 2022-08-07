<template>
<scrollUp />
  <img class="mx-auto" src="https://www.upload.ee/image/14393841/ez.jpg"/>
  <div v-if="about[0]" class="container min-h-screen my-6 mx-auto px-8 md:px-12">
    <h1 class="mt-10 text-white dark:text-black text-center uppercase font-black drop-shadow-lg text-3xl sm:text-6xl">
    {{ firstAboutSectionTitle() }}
    </h1>
    <div class="mx-auto border-t-4 mt-1 mb-2 w-48 border-red-500"></div>
    <p v-html="firstAboutSectionBody()" class="text-white dark:text-black text-justify mt-5"></p>
    <!-- Quem Somos Content -->
    <div v-for="aboutList in about.slice(1)" :key="aboutList.id" class="mt-4">
    <h1
      class="text-white dark:text-black text-center capitalize font-semibold text-2xl sm:text-5xl mt-5">
        {{aboutList.title}}
    </h1>
    <p v-html="aboutList.subtitle" class="text-white dark:text-black text-justify mt-4"></p>
    </div>
    <div class="w-full px-2 sm:px-0 mt-4">
        <h1
      class="text-white dark:text-black text-center capitalize font-semibold text-2xl sm:text-5xl mt-20">
        FAQ
    </h1>
    <div class="mx-auto w-full max-w-screen rounded-2xl mt-4">
      <Disclosure v-slot="{ open }">
        <DisclosureButton class="flex w-full justify-between border-b px-4 py-2 text-left text-base sm:text-lg font-medium text-neutral-200 dark:text-neutral-800"
            :class="open ? 'border-red-500' : 'border-neutral-700'"> 
          <span>Quem criou este website?</span>
          <ChevronUpIcon :class="open ? 'rotate-180 transform' : ''" class="h-5 w-5 text-neutral-200 dark:text-neutral-800 text-lg"
          />
        </DisclosureButton>
        <DisclosurePanel class="px-8 pt-4 pb-2 text-base sm:text-lg text-neutral-200 dark:text-neutral-800">
          Criado por <strong>Luís Peixoto</strong>,<strong> Marco Moreira</strong> e <strong>Simão Amaral</strong> com <strong>Laravel</strong> e <strong>Vue</strong>.
        </DisclosurePanel>
      </Disclosure>
      <Disclosure v-for="question in questions" :key="question.id" as="div" class="mt-2" v-slot="{ open }">
        <DisclosureButton
          class="flex w-full justify-between border-b px-4 py-2 text-left text-base sm:text-lg font-medium text-neutral-200 dark:text-neutral-800 hover:text-white focus:outline-none focus-visible:ring focus-visible:ring-red-500 focus-visible:ring-opacity-75"
                  :class="open ? 'border-red-500' : 'border-neutral-700'">
          <span>{{question.question}}</span>
          <ChevronUpIcon
            :class="open ? 'rotate-180 transform' : ''"
            class="h-5 w-5 text-neutral-200 dark:text-neutral-800 transition-transform"
          />
        </DisclosureButton>
        <DisclosurePanel class="px-8 pt-4 pb-2 text-base sm:text-lg text-neutral-200 dark:text-neutral-800">
          {{question.answer}}
        </DisclosurePanel>
      </Disclosure>
    </div>
  </div>
  </div>
</template>

<script>
import scrollUp from "../components/scrollUp.vue";
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronUpIcon } from '@heroicons/vue/solid'
import { useStore } from "vuex";
import { computed } from "vue";

export default {
  data() {
    const store = useStore();
    store.dispatch("getQuestions");
    store.dispatch("getAbout");
    store.dispatch("getAboutImage");

    return {
      about: computed(() => store.state.about.data),
      questions: computed(() => store.state.questions.data),
      aboutimage: computed(() => store.state.aboutImage.data),
    };
  },
  methods: {
    firstAboutSectionTitle() {
      return this.about[0].title;
    },
    firstAboutSectionBody() {
      return this.about[0].subtitle;
    },
  },
  components: { Disclosure, DisclosureButton, DisclosurePanel, ChevronUpIcon, scrollUp },
};
</script>
<style>
</style>