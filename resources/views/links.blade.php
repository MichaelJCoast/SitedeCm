<x-main>
    <div class="items-center mt-6">
        <h1 class="font-bold text-center text-5xl">Links</h1>
    </div>
    <div class="py-6 flex items-center justify-center">
        <div class="grid grid-cols-1 gap-8 min-w-max">
            @foreach($links as $link)
                <x-link :link="$link"></x-link>
        </div>
        @endforeach
    </div>
</x-main>
