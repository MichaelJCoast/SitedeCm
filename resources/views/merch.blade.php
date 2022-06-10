<x-app-layout>

<a href="order"> <h1 class="text-white text-right pr-10">carrinho</h1> </a>
            
<div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-2xl font-extrabold tracking-tight dark:text-white" id="produtos" >Merch CM</h2>

    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

    @foreach($merch as $key => $data)
    <form method="get" action="merch/product">

      <div class="group relative w-full min-h-50 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75  transform transition duration-500 group-hover:scale-110  lg:h-80 lg:aspect-none">
        <input type="hidden" id="userId" name="id" value="{{$data->id}}">
        <div class="group relative">
              <h3 class="text-sm text-white">
                {{$data->name}}  ->  {{$data->price}}
              </h3>
            </div>
        <input type="image" name="id" style="object-position: center;object-fit: cover; height:100%;" src="../laravel/{{$data->photo}}">
    </form> 

      </div>
        @endforeach

      </div>
    </div>
  </x-app-layout>
