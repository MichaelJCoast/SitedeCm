<x-app-layout>
    <x-carousel />
    <div class="container mx-auto px-8 md:px-14 mb-10 text-white">
            <h2 class="sm:mt-0 text-2xl 2xl:text-4xl font-semibold py-6"><a href="blog">Notícias</a></h2>
            @if(!$posts->isEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach($posts as $post)
                        <x-post-card :post="$post"></x-post-card>
                    @endforeach
                </div>
            @else
                <p class="text-center">No posts yet.</p>
            @endif
    </div>
</x-app-layout>
