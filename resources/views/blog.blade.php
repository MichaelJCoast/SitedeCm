<x-app-layout>
<div class="container px-6 sm:px-4 mb-20 mx-auto">
    <div class="py-10 2xl:py-10 overflow-hidden">
        <div class="max-w-xl mx-auto">
            <img class="rounded-2xl sm:rounded-lg" src="../../laravel/{{$post->image}}" alt="post image">
            <p class="mt-6 text-sm sm:text-base font-semibold text-gray-300">{{$post->category}}</p>
            <h2 class="mt-6 text-4xl sm:text-5xl text-white font-bold">
                {{$post->title}}
            </h2>
            <p class="mt-6 mb-6 text-xs sm:text-sm font-normal sm:font-semibold">
                {{Carbon\Carbon::parse($post->created_at)->format('F j, Y')}}
            </p>
            <p>
                {!! $post->body !!}
            </p>
        </div>
    </div>
</div>
</x-app-layout>