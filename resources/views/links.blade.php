<x-app-layout>
    <div class="mx-auto max-w-sm sm:max-w-xl">
        <h1 class="font-bold text-center text-5xl mt-6 text-white">Links</h1>
        <div class="mt-4 grid grid-cols-1 gap-6">
            @foreach($links as $link)
                <x-link :link="$link"></x-link>
            @endforeach
        </div>
    </div>
</x-app-layout>
