<template>
  <div v-if="about[0]" class="container min-h-screen my-6 mx-auto px-8 md:px-14">
    <h1
      class="text-white text-center uppercase font-black drop-shadow-lg text-3xl sm:text-6xl"
    >
    {{ firstAboutSectionTitle() }}
    </h1>
    <div class="mx-auto border-t-4 mt-1 mb-2 w-48 border-red-500"></div>
    <p v-html="firstAboutSectionBody()" class="text-white text-justify"></p>
    <!-- Quem Somos Content -->
    <div v-for="aboutList in about.slice(1)" :key="aboutList.id" class="mt-4">
    <h1
      class="text-white text-center capitalize font-semibold text-2xl sm:text-5xl">
        {{aboutList.title}}
    </h1>
    <p v-html="aboutList.subtitle" class="text-white text-justify mt-4"></p>
    </div>
    <div class="w-full px-2 mt-4 sm:px-4">
        <h1
      class="text-white text-center capitalize font-semibold text-2xl sm:text-5xl">
        FAQ
    </h1>
    <div class="mx-auto w-full max-w-screen rounded-2xl mt-4 p-2">
      <Disclosure v-slot="{ open }">
        <DisclosureButton
          class="flex w-full justify-between border-b border-neutral-700 px-4 py-2 text-left text-base sm:text-lg font-medium text-neutral-200 hover:text-white focus:outline-none focus-visible:ring focus-visible:ring-red-500 focus-visible:ring-opacity-75"
        >
          <span>Quem criou este website?</span>
          <ChevronUpIcon
            :class="open ? 'rotate-180 transform' : ''"
            class="h-5 w-5 text-neutral-200 text-lg"
          />
        </DisclosureButton>
        <DisclosurePanel class="px-4 pt-4 pb-2 text-base sm:text-lg text-neutral-200">
          Criado por Luís Peixoto, Marco Moreira e Simão Amaral com Laravel e Vue.
        </DisclosurePanel>
      </Disclosure>
      <Disclosure v-for="question in questions" :key="question.id" as="div" class="mt-2" v-slot="{ open }">
        <DisclosureButton
          class="flex w-full justify-between border-b border-neutral-700 px-4 py-2 text-left text-base sm:text-lg font-medium text-neutral-200 hover:text-white focus:outline-none focus-visible:ring focus-visible:ring-red-500 focus-visible:ring-opacity-75"
        >
          <span>{{question.question}}</span>
          <ChevronUpIcon
            :class="open ? 'rotate-180 transform' : ''"
            class="h-5 w-5 text-neutral-200 transition-transform"
          />
        </DisclosureButton>
        <DisclosurePanel class="px-4 pt-4 pb-2 text-base sm:text-lg text-neutral-200">
          {{question.answer}}
        </DisclosurePanel>
      </Disclosure>
    </div>
  </div>
  </div>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronUpIcon } from '@heroicons/vue/solid'
import { useStore } from "vuex";
import { computed } from "vue";

export default {
  data() {
    const store = useStore();
    store.dispatch("getQuestions");
    store.dispatch("getAbout");
    return {
      about: computed(() => store.state.about.data),
      questions: computed(() => store.state.questions.data),
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
  components: { Disclosure, DisclosureButton, DisclosurePanel, ChevronUpIcon },
};
</script>