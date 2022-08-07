<template>
<!-- Card -->
<div class="flex flex-col h-full w-full 2xl:w-auto bg-black dark:bg-neutral-200 rounded-lg shadow-md overflow-hidden">
    <!-- Image -->
    <a class="block focus:outline-none focus-visible:ring-2" :href="'merch/' + product.id">
        <figure class="relative h-0 pb-[70%] sm:pb-[100%] overflow-hidden">
            <img class="absolute inset-0 w-full h-full object-cover"
                :src="product.photo"
                width="320" height="180" alt="image">
        </figure>
    </a>
    <!-- Card Content -->
    <div class="flex-grow flex flex-col p-4">
        <!-- Card body -->
        <div class="flex-grow">
            <!-- Title -->
            <div class="mb-3">
                <h3 class="mb-2 text-sm lg:text-base tracking-tight font-semibold text-white dark:text-black">{{ product.name }}</h3>
            </div>
            <div>
                <p class="font-semibold text-white dark:text-black">€{{ product.price.toFixed(2) }}</p>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: ['product'],
    };
</script>
