@extends('layouts.main')
@section('content')


@section('content')


<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
@foreach($dep as $key => $datadep)

@foreach($team as $key => $data)
<?php 
if( $datadep->id == $data->dep_id)
{
   ?>
  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../laravel/{{$data->image}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$data->nome}}</h5>
    <p class="card-text">{{$datadep->name}}</p>
    <a href="#" class="btn btn-primary">{{$data->role_id}}</a>
  </div>
</div>
<?php
} 

    ?>

@endforeach
@endforeach
</div>

@include('layouts.footer')
@endsection
