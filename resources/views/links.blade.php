@extends('layouts.main')
@section('content')
<div class="items-center mt-6">
  <h1 class="font-bold text-center text-5xl">Links</h1>
</div>
<div class="py-6 flex items-center justify-center">
    <div class="grid grid-cols-1 gap-8 min-w-max">
            @foreach($link as $key => $data)
            <div class="p-6 border-l-4 border-red-500 bg-black">
                <div class="flex items-center justify-between cursor-pointer">
                    <a href="{{$data->link_to}}" class="text-lg text-center font-medium text-white">
                        {{$data->name}}
                    </a>
            </div>
        </div>
        @endforeach
    </div>
    @include('layouts.footer')
    @endsection