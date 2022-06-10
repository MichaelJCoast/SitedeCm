<x-app-layout>
    <x-carousel />
    <div class="container mx-auto px-8 md:px-14 mb-10 text-white space-y-6">
        @if(!$posts->isEmpty())
        <div class="mt-6">
            <x-header-title :href="route('blog')">Últimas Notícias</x-header-title>
        </div>  
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-6">
                    @foreach($posts as $post)
                        <x-post-card :post="$post"></x-post-card>
                    @endforeach
                </div>
            <div class="text-center">
                <a href="blog" class="font-semibold transition ease-in-out rounded-lg text-lg bg-transparent hover:bg-red-700 px-4 py-2">Ver mais notícias</a>
            </div>
        @endif
        <div class="mt-6">
            <x-header-title>Parcerias</x-header-title>
        </div>
    </div>
</x-app-layout>
