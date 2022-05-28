@extends('layouts.main')

@section('content')
<div class="container px-4 mx-auto">
    <div class="py-10 2xl:py-10 overflow-hidden">
        <div class="max-w-2xl mx-auto">
            <img class="rounded-lg" src="{{$post->image}}" alt="">
            <h2 class="mt-7 text-5xl text-white font-bold">
                {{$post->title}}
            </h2>
            <p class="mb-6 font-semibold">{{$post->category}}</p>
            <p class="mb-6">
                {{Carbon\Carbon::parse($post->published_at)->format('F j, Y')}}
            </p>
            <p>
                {!! $post->body !!}
            </p>
        </div>

    </div>
</div>


@include('layouts.footer')
@endsection