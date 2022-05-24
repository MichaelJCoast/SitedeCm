@extends('layouts.main')

@section('content')
<x-carousel/>
    <div class="min-h-screen container mx-auto px-4 pb-16">
        <div class="latest-news">
            <h2 class="text-3xl font-semibold pb-6">Últimas Notícias</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
            @foreach($post as $key => $data)
            <div class="bg-black rounded-lg border border-zinc-700 shadow-md">
    <a href="#">
        <img class="rounded-t-lg" src="{{$data->image}}" alt="" />
    </a>
    <div class="p-5">
    <div class="flex flex-row items-center space-x-4 pb-2">
                <span class="text-lg text-white font-semibold">{{$data->category}}</span>
                <span class="text-gray-500 font-semibold">{{$data->published_at}}</span>
            </div>
        <a href="#">
        <h5 class="mb-2 text-3xl font-bold tracking-tight text-white">{{$data->title}}</h5>
        </a>
    </div>
</div>
@endforeach
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection