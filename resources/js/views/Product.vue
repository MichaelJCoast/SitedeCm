<template>
  <div class="container min-h-screen mx-auto mb-6 lg:mt-6 text-neutral-900 dark:text-neutral-200">
    <Loading v-if="loading" />
    <div v-else class="grid grid-flow-row lg:grid-flow-col">
      <img class="h-96 mx-auto" :src="'../' + product.photo" :alt="product.name + ' image'">
      <div class="mt-6 space-y-4 margin-0 lg:text-left text-center">
        <p class="font-semibold text-xl capitalize">{{ product.name }}</p>
        <p v-html="product.description" class="text-neutral-600 dark:text-neutral-400 capitalize"></p>
        <p class="font-semibold text-lg">€{{ product.price }}</p>
        <RadioGroup v-model="size">
          <RadioGroupOption as="button" v-for="(size, i) in product.sizes" :key="i" :value="size.name"
            v-slot="{ checked }">
            <button class="border border-black dark:border-neutral-200 px-6 py-4 w-full font-semibold p.0"
              :class="checked ? 'text-neutral-200 bg-red-700 dark:text-neutral-900 dark:bg-neutral-200' : 'bg-transparent text-neutral-900 dark:text-neutral-200 dark:bg-transparent'">
              {{ size.name }}
            </button>
          </RadioGroupOption>
        </RadioGroup>
        <button @click="addToCart()" type="submit" class="p-4 rounded-md uppercase bg-red-700 hover:brightness-125">
          <p class="font-bold text-neutral-200">Adicionar ao carrinho</p>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import swal from 'sweetalert2'
import { computed } from "vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";
import Loading from "../components/Loading.vue";
import { ref } from "vue";
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";

export default {
  data() {
    const route = useRoute();
    const store = useStore();
    store.dispatch("getProductById", route.params.id);

    return {
      size: null,
      clicked: false,
      product: computed(() => store.state.currentProduct),
      loading: computed(() => store.state.merch.loading),
    };
  },
  methods: {
    addToCart() {
      if (this.product.sizes.length > 0) {
        if (this.size === null) {
          swal.fire({
            position: 'top-end',
            title: "Seleciona um tamanho",
            icon: 'error',
            customClass: "buttonError",
            timer: 3000,
            toast: true,
            timerProgressBar: true,
            showConfirmButton: false,
          });
        }
        else {
          swal.fire({
            position: 'top-end',
            title: "Adicionado ao Carrinho",
            icon: 'success',
            customClass: "buttonSucess",
            timer: 3000,
            toast: true,
            timerProgressBar: true,
            showConfirmButton: false,
          });
          this.$store.commit("addToCart", {
            product: this.product,
            selectedSize: this.size,
          });
        }
      }
      else {
        swal.fire({
            position: 'top-end',
            title: "Adicionado ao Carrinho",
            icon: 'success',
            customClass: "buttonSucess",
            timer: 3000,
            toast: true,
            timerProgressBar: true,
            showConfirmButton: false,
          });
          this.$store.commit("addToCart", {
            product: this.product,
            selectedSize: '',
          });
      }
    },
  },
  components: {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
    Loading,
  },
};
</script>
<style>
.buttonError {
  margin-top: 80px;
}

.buttonError .swal2-timer-progress-bar {
  background-color: red;
}

.buttonSucess {
  margin-top: 80px;
}

.buttonSucess .swal2-timer-progress-bar {
  background-color: green;
}

@media (max-width: 1024px) {
  .buttonError {
    margin-top: 0px;
  }

  .buttonSucess {
    margin-top: 0px;
  }
}
</style>