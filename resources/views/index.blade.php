<x-main>
    <x-carousel />
    <div class="container mx-auto px-8 sm:px-8 md:px-14 mb-28">
        <div class="latest-news">
            <h2 class="sm:mt-0 text-2xl font-semibold py-6">Notícias</h2>
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
    </div>
</x-main>
