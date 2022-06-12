<x-app-layout>
    <div class="grid xl:grid-flow-col xl:auto-cols-fr bg-black">
        <a href="blog/{{$posts->first()->slug}}">
            <img src="{{$posts->first()->image}}">
        </a>
        <div class="flex-grow flex flex-col p-6">
            <!-- Card body -->
            <div class="flex-grow">
                <!-- Category & Date -->
                <header class="flex sm:flex-row items-center space-x-4 pb-2">
                    <span class="text-sm lg:text-base text-white font-semibold">{{$posts->first()->category}}</span>
                    <time class="text-sm lg:text-base text-gray-400 font-semibold">{{ Carbon\Carbon::parse($posts->first()->created_at)->translatedFormat('j F, Y') }}</time>
                </header>
                <!-- Title -->
                <div class="mb-3">
                    <a class="block focus:outline-none focus-visible:ring-2" href="blog/{{$posts->first()->slug}}">
                        <h3 class="mb-2 text-xl md:text-2xl xl:text-4xl font-bold tracking-tight text-white">{{$posts->first()->title}}</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-6 mx-auto px-8 md:px-14 mb-10 text-white">
            @if(!$posts->isEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach($posts as $post)
                    @if ($loop->first) @continue @endif
                        <x-post-card :post="$post"></x-post-card>
                    @endforeach
                </div>
            @else
                <p class="text-center">No posts yet.</p>
            @endif
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
            </div>
    </div>
</x-app-layout>