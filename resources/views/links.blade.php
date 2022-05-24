@extends('layouts.main')
@section('content')
<div class="min-h-screen">
<div class="py-6 flex items-center justify-center">
<div class="grid grid-cols-1 gap-12">
<h1 class="font-bold text-center text-5xl">Links</h1>
@foreach($link as $key => $data)
<a type="button" href="{{$data->link_to}}" class="py-6 px-52 bg-black border border-white hover:bg-red-800 text-white h-20 transition ease-in duration-200 text-center text-xl font-semibold shadow-md rounded-lg">
  {{$data->name}}
</a>
@endforeach
</div>
</div>
</div>
@include('layouts.footer')
@endsection