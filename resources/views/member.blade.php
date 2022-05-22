@extends('layouts.main')
@section('content')


@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
@foreach($team as $key => $data)

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://media.wired.co.uk/photos/60c8730fa81eb7f50b44037e/3:2/w_3329,h_2219,c_limit/1521-WIRED-Cat.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$data->name}}</h5>
    <p class="card-text">{{$data->department}}</p>
    <a href="#" class="btn btn-primary">{{$data->role}}</a>
  </div>
</div>
    

@endforeach
</div>

@include('layouts.footer')
@endsection
