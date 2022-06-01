@props(['link'])

<div class="p-6 border-l-4 border-red-500 bg-black">
    <div class="flex items-center justify-between cursor-pointer">
        <a href="{{$link->link_to}}" class="text-lg text-center font-medium text-white">
            {{$link->name}}
        </a>
</div>
</div>