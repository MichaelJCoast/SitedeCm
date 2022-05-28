@extends('layouts.main')

@section('content')

@php
if(!isset($_GET['id'])){}else{}
@endphp


@foreach($merch as $key => $data)


<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">

    <img src="{{$data->photo}}" class="max-w-sm rounded-lg shadow-2xl" />

    <div>
      <h1 class="text-5xl font-bold">{{$data->name}}</h1>
      <p class="py-6">{{$data->price}} $</p>
      <button class="btn btn-primary">Comprar</button>
    </div>
  </div>
</div>



@endforeach

@include('layouts.footer')
@endsection