<x-app-layout>
    <x-carousel />
    <div class="container mx-auto px-8 md:px-14 mb-10 text-black space-y-6 dark:text-white">
        @if(!$posts->isEmpty())
        <div class="mt-6">
            <x-header-title :href="route('blog')">{{__("index.newsTitle")}}</x-header-title>
        </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-6">
                    @foreach($posts as $post)
                        <x-post-card :post="$post"></x-post-card>
                    @endforeach
                </div>
            <div class="text-center">
                <a href="blog" class="font-semibold transition ease-in-out rounded-lg text-lg bg-gray-500 text-white dark:bg-neutral-600 dark:hover:bg-neutral-500 px-8 py-2">Mais Notícias</a>
            </div>
        @endif
    </div>


    <div id="app">
        <example-component></example-component>
    </div>    
        <script src="{{asset('js/app.js')}}"></script>


</x-app-layout>



