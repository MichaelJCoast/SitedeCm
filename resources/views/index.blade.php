@extends('layouts.main')

@section('content')
<x-carousel />
<div class="min-h-screen container mx-auto px-4 pb-16">
    <div class="latest-news">
        <h2 class="text-3xl font-semibold pb-6">Últimas Notícias</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
            @foreach($post as $key => $data)
            <!-- Snippet -->
                    <!-- Card -->
                        <div class="flex flex-col h-full bg-black border border-zinc-700 rounded-lg overflow-hidden">
                            <!-- Image -->
                            <a class="block focus:outline-none focus-visible:ring-2" href=blog/{{$data->slug}}>
                                <figure class="relative h-0 pb-[56.25%] overflow-hidden">
                                    <img class="absolute inset-0 w-full h-full object-cover transform"
                                        src="{{$data->image}}"
                                        width="320" height="180" alt="image">
                                </figure>
                            </a>
                            <!-- Card Content -->
                            <div class="flex-grow flex flex-col p-5">
                                <!-- Card body -->
                                <div class="flex-grow">
                                    <!-- Category & Date -->
                                    <header class="flex flex-row items-center space-x-4 pb-2">
                                        <span class="text-lg text-white font-semibold">{{$data->category}}</span>
                                        <span class="text-gray-500 font-semibold">{{Carbon\Carbon::parse($data->published_at)->format('F j, Y')}}</span>
                                    </header>
                                    <!-- Title -->
                                    <div class="mb-3">
                                        <a class="block focus:outline-none focus-visible:ring-2" href="blog/{{$data->slug}}">
                                            <h3 class="mb-2 text-3xl font-bold tracking-tight text-white">{{$data->title}}</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')
@endsection