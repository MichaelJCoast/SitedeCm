@props(['post'])

<!-- Card -->
<div class="flex flex-col h-full w-full xl:w-96 2xl:w-auto bg-black border border-zinc-700 rounded-lg overflow-hidden">
    <!-- Image -->
    <a class="block focus:outline-none focus-visible:ring-2" href="blog/{{$post->slug}}">
        <figure class="relative h-0 pb-[70%] sm:pb-[100%] overflow-hidden">
            <img class="absolute inset-0 w-full h-full object-cover"
                src="{{$post->image}}"
                width="320" height="180" alt="image">
        </figure>
    </a>
    <!-- Card Content -->
    <div class="flex-grow flex flex-col p-6">
        <!-- Card body -->
        <div class="flex-grow">
            <!-- Category & Date -->
            <header class="flex sm:flex-row items-center space-x-4 pb-2">
                <span class="text-sm lg:text-base text-white font-semibold">{{$post->category}}</span>
                <time class="text-sm lg:text-base text-gray-400 font-semibold">{{ Carbon\Carbon::parse($post->created_at)->translatedFormat('j F, Y') }}</time>
            </header>
            <!-- Title -->
            <div class="mb-3">
                <a class="block focus:outline-none focus-visible:ring-2" href="blog/{{$post->slug}}">
                    <h3 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-white">{{$post->title}}</h3>
                </a>
            </div>
        </div>
    </div>
</div>