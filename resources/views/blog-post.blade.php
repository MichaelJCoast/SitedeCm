<x-app-layout>
<div class="container mx-auto text-gray-900 dark:text-white">
            <img class="lg:w-[95%] xl:w-[75%] 2xl:w-[50%] mx-auto" src="../{{$post->image}}" alt="post image">
            <div class="px-8 pb-14 lg:px-52 xl:px-80">
                <p class="mt-6 text-sm uppercase tracking-[.2em] text-red-600">{{$post->category}}</p>
                <h2 class="text-4xl sm:text-3xl md:text-5xl lg:text-4xl text-gray-900 dark:text-white font-bold sm:leading-normal">
                    {{$post->title}}
                </h2>
                <p class="mt-6 mb-6 text-xs md:text-sm font-normal text-gray-700 dark:text-gray-400 sm:font-semibold">
                    {{Carbon\Carbon::parse($post->created_at)->translatedFormat('j F, Y')}}
                </p>
                <div class="text-justify md:text-lg 2xl:text-xl leading-relaxed text-gray-900 dark:text-gray-200">
                    {!! $post->body !!}
                </div>
            </div>
</div>
</x-app-layout>
