@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pb-16">
    <div x-data="carousel()" class="carousel-call-to-action pb-12">
        <div id="default-carousel" class="relative" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="overflow-hidden relative h-56 sm:h-64 xl:h-80 2xl:h-96">
         <!-- Item 1 -->
        <div class="active duration-700 ease-in-out" data-carousel-item>
            <span class="absolute top-1/2 left-1/2 text-2xl font-semibold -translate-x-1/2 -translate-y-1/2 sm:text-3xl text-white">First Slide</span>
            <img :src="images[selected]" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://necm.utad.pt/wp-content/uploads/2022/01/banner_Prancheta-1.png" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://alexanderskogberg.com/wp-content/webp-express/webp-images/doc-root/wp-content/uploads/2018/12/featured-read-dead-redemption-2.jpg.webp" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
    </div>
    <!-- Slider controls -->
    <button @click="if (selected > 0 ) {selected -= 1} else { selected = images.length - 1 }" type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="hidden">Previous</span>
        </span>
    </button>
    <button @click="if (selected < images.length - 1  ) {selected += 1} else { selected = 0 }" type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="hidden">Next</span>
        </span>
    </button>
</div>
</div>
        <div class="latest-news">
            <h2 class="text-3xl font-semibold pb-6">Últimas Notícias</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
            <div class="bg-black rounded-lg border border-zinc-700 shadow-md">
    <a href="#">
        <img class="rounded-t-lg" src="https://assets.bondlayer.com/nbnfvt8dsd/_assets/sb_dia-da-cerveja_cover2.jpg" alt="" />
    </a>
    <div class="p-5">
    <div class="flex flex-row items-center space-x-4 pb-2">
                <span class="text-lg text-white font-semibold">Evento Recreativo</span>
                <span class="text-gray-500 font-semibold">12 de maio, 2022</span>
            </div>
        <a href="#">
        <h5 class="mb-2 text-3xl font-bold tracking-tight text-white">Sunset UTASCA</h5>
        </a>
    </div>
</div>

<div class="bg-black rounded-lg border border-zinc-700 shadow-md">
    <a href="#">
        <img class="rounded-t-lg" src="https://assets.bondlayer.com/nbnfvt8dsd/_assets/sb_dia-da-cerveja_cover2.jpg" alt="" />
    </a>
    <div class="p-5">
    <div class="flex flex-row items-center space-x-4 pb-2">
                <span class="text-lg text-white font-semibold">Evento Pedagógico</span>
                <span class="text-gray-500 font-semibold">12 de maio, 2022</span>
            </div>
        <a href="#">
        <h5 class="mb-2 text-3xl font-bold tracking-tight text-white">MAPS</h5>
        </a>
    </div>
</div>

<div class="bg-black rounded-lg border border-zinc-700 shadow-md">
    <a href="#">
        <img class="rounded-t-lg" src="https://assets.bondlayer.com/nbnfvt8dsd/_assets/sb_dia-da-cerveja_cover2.jpg" alt="" />
    </a>
    <div class="p-5">
    <div class="flex flex-row items-center space-x-4 pb-2">
                <span class="text-lg text-white font-semibold">Evento Recreativo</span>
                <span class="text-gray-500 font-semibold">12 de maio, 2022</span>
            </div>
        <a href="#">
        <h5 class="mb-2 text-3xl font-bold tracking-tight text-white">Queima 2022</h5>
        </a>
    </div>
</div>

            </div>
        </div>
    </div>

    @include('layouts.footer')

<script>
    const carousel = () => {
    return {
        selected: 0,
        images: [
            "https://necm.utad.pt/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-28-at-20.08.07-e1640816963642.jpeg",
            "https://necm.utad.pt/wp-content/uploads/2022/01/banner_Prancheta-1.png"
        ]
    };
};
        </script>
@endsection