@extends('layouts.main')

@section('content')


@section('content')
<div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-2xl font-extrabold tracking-tight dark:text-white" id="produtos" >Merch CM</h2>

    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

    @foreach($merch as $key => $data)
      <div class="group relative">
      <!-- DIV IMAGEM -->
      <div class="w-full min-h-50 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75  transform transition duration-500 group-hover:scale-110  lg:h-80 lg:aspect-none">
      <a href="#">
          <img src="{{$data->photo}}" class="w-full h-full object-center object-cover lg:w-full lg:h-full ">
        </div>
        </a>
        <!-- BLOCO COM TUDO -->
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700 dark:text-white">
                <span aria-hidden="true" class="absolute inset-0 "></span>
                {{$data->name}}
            </h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-white">{{$data->quantity}} restantes</p>
          </div>
          <p class="text-sm font-medium text-gray-900 dark:text-white">{{$data->price}} €</p>
        </div>
        <div style="position:absolute; margin-top:-26px; margin-left:165px">
        </div>
        </div>

        @endforeach

      </div>
    </div>
        





@include('layouts.footer')
@endsection