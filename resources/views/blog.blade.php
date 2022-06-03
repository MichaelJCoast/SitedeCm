<x-app-layout>
<div class="container lg:mx-auto">
            <img class="lg:w-[95%] xl:w-[75%] 2xl:w-[65%] lg:mx-auto" src="../../laravel/{{$post->image}}" alt="post image">
            <div class="px-14 pb-14 lg:px-52 xl:px-80">
                <p class="mt-6 text-sm sm:text-base font-semibold text-gray-300">{{$post->category}}</p>
                <h2 class="mt-6 text-4xl sm:text-3xl md:text-5xl lg:text-4xl text-white font-bold sm:leading-normal">
                    {{$post->title}}
                </h2>
                <p class="mt-6 mb-6 text-xs md:text-sm font-normal text-gray-400 sm:font-semibold">
                    {{Carbon\Carbon::parse($post->created_at)->format('F j, Y')}}
                </p>
                <p>
                    {!! $post->body !!}
                </p>
            </div> 
</div>
</x-app-layout>