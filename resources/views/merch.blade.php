<x-app-layout>
  <div class="container mx-auto px-8 md:px-14 mb-10 text-white">
        <h2 class="sm:mt-0 text-2xl 2xl:text-3xl font-semibold py-6">Merch</h2>
        @if(!$merch->isEmpty())
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
                @foreach($merch as $item)
                    <x-merch-card :merch="$item"></x-merch-card>
                @endforeach
            </div>
        @else
            <p class="text-center">No merch yet.</p>
        @endif
</div>
</x-app-layout>
