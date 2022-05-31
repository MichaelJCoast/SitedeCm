<x-main>
    <x-carousel />
    <div class="container mx-auto px-4 pb-16 mb-12">
        <div class="latest-news">
            <h2 class="sm:mt-0 mt-48 text-3xl font-semibold py-6">Últimas Notícias</h2>
            @if(!$posts->isEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
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
