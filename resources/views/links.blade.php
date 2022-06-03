<x-app-layout>
    <div class="container px-6 sm:px-4 mt-4 mx-auto">
        @if(!$links->isEmpty())
        <h1 class="font-bold text-center text-5xl">Links</h1>
        <div class="mt-4 grid grid-cols-1 gap-6">
            @foreach($links as $link)
                <x-link :link="$link"></x-link>
            @endforeach
        </div>
            @else
                <p class="text-center font-semibold text-5xl">No Links Yet</p>
            @endif
        
    </div>
</x-app-layout>
