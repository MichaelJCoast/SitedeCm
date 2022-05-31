@props(['post'])

<!-- Card -->
<div class="flex flex-col h-full bg-black border border-zinc-700 rounded-lg overflow-hidden">
    <!-- Image -->
    <a class="block focus:outline-none focus-visible:ring-2" href="blog/{{$post->slug}}">
        <figure class="relative h-0 pb-[100%] overflow-hidden">
            <img class="absolute inset-0 w-full h-full object-cover transform"
                src="../laravel/{{$post->image}}"
                width="320" height="180" alt="image">
        </figure>
    </a>
    <!-- Card Content -->
    <div class="flex-grow flex flex-col p-8">
        <!-- Card body -->
        <div class="flex-grow">
            <!-- Category & Date -->
            <header class="flex flex-row items-center space-x-4 pb-2">
                <span class="text-lg text-white font-semibold">{{$post->category}}</span>
                <time class="text-gray-500 font-semibold">{{ Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</time>
            </header>
            <!-- Title -->
            <div class="mb-3">
                <a class="block focus:outline-none focus-visible:ring-2" href="blog/{{$post->slug}}">
                    <h3 class="mb-2 text-3xl font-bold tracking-tight text-white">{{$post->title}}</h3>
                </a>
            </div>
        </div>
    </div>
</div>