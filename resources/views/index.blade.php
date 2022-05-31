<x-main>
    <x-carousel />
    <div class="container mx-auto px-8 sm:px-4 mb-28">
        <div class="latest-news">
            <h2 class="sm:mt-0 text-xl sm:text-3xl font-semibold py-6">Últimas Notícias</h2>
            @if(!$posts->isEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
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
