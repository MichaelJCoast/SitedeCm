@extends('layouts.main')
@section('content')


@section('content')

@foreach($dep as $key => $datadep)

<p class="card-text">{{$datadep->name}}</p>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">


@foreach($team as $key => $data)

@if($datadep->id ==$data->dep_id)

  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../laravel/{{$data->image}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$data->nome}}</h5>
    <p class="card-text">{{$datadep->name}}</p>
    @foreach($role as $key => $datarole)
    @if($datarole->id == $data->role_id)
    <a href="#" class="btn btn-primary">{{$datarole->type}}</a>
    @endif
    @endforeach
  </div>
</div>

@endif
@endforeach
</div>
@endforeach
@include('layouts.footer')
@endsection
