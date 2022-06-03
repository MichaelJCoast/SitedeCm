<x-app-layout>
<div class="container lg:mx-auto">
            <img class="lg:w-[95%] 2xl:w-[65%] lg:mx-auto" src="../../laravel/{{$post->image}}" alt="post image">
            <div class="px-14 pb-14">
                <p class="mt-6 text-sm sm:text-base font-semibold text-gray-300">{{$post->category}}</p>
                <h2 class="mt-6 text-4xl sm:text-5xl text-white font-bold sm:first-line:leading-loose">
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
</x-app-layout>