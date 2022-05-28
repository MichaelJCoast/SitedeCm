@extends('layouts.main')

@section('content')

@php
if(!isset($_GET['id'])){}else{}
@endphp


@foreach($merch as $key => $data)

<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>


<div class="flex text-base text-left transform transition w-full">
  <div class="w-full relative flex items-center px-4 pt-14 pb-8 overflow-hidden shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
      <div class="w-full grid grid-cols-1 gap-y-8 gap-x-6 items-start sm:grid-cols-12 lg:gap-x-8">   
        <div class="aspect-w-2 aspect-h-3 rounded-lg bg-gray-100 overflow-hidden sm:col-span-4 lg:col-span-5">
          <img src="{{$data->photo}}" alt="Two each of gray, white, and black shirts arranged on table." class="object-center object-cover">
        </div>
        <div class="sm:col-span-8 lg:col-span-7">
          <h2 class="text-5xl font-extrabold text-white sm:pr-12">{{$data->name}}</h2>
            <section aria-labelledby="information-heading" class="mt-2">
              <p class="text-4xl text-white">{{$data->price}} $</p>

                <!-- Reviews -->
                <div class="mt-6">
                  <div class="flex items-center">
                    <div class="flex items-center">
  
                      <svg class="text-yellow-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      </svg>

                      <svg class="text-yellow-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      </svg>

                      <svg class="text-yellow-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      </svg>

                      <svg class="text-yellow-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      </svg>

                      <svg class="text-gray-200 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      </svg>
                    </div>
                    <a href="#" class="ml-3 text-sm font-medium text-red-600 hover:text-red-500">{{$data->quantity}} ratings</a>
                  </div>
                </div>
              </section>

                <form method="get" action="product">
                <input type="hidden" id="userId" name="id" value="{{$data->id}}">
                  <!-- Sizes -->
                  <div class="mt-10">
                    <div class="flex items-center justify-between">
                      <h4 class="text-sm text-white font-medium">Tamanho</h4>
                    </div>

                    <fieldset class="mt-4">
                      <div class="grid grid-cols-8 gap-4">

                        <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-200 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                          <input type="radio" name="size" value="XXS" class="sr-only" aria-labelledby="size-0-label">
                          <span id="size-0-label"> XXS </span>

                          <span class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></span>
                        </label>

                        <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-200 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                          <input type="radio" name="size" value="XS" class="sr-only" aria-labelledby="size-1-label">
                          <span id="size-1-label"> XS </span>

                          <span class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></span>
                        </label>

                        <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-200 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                          <input type="radio" name="size" value="S" class="sr-only" aria-labelledby="size-2-label">
                          <span id="size-2-label"> S </span>

                          <span class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></span>
                        </label>

                        <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-200 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                          <input type="radio" name="size" value="M" class="sr-only" aria-labelledby="size-3-label">
                          <span id="size-3-label"> M </span>

                          <span class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></span>
                        </label>

                        <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-200 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                          <input type="radio" name="size" value="L" class="sr-only" aria-labelledby="size-4-label">
                          <span id="size-4-label"> L </span>

                          <span class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></span>
                        </label>

                        <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-200 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer ">
                          <input type="radio" name="size" value="XL" class="sr-only peer" aria-labelledby="size-5-label">
                          <span id="size-5-label"> XL </span>

                          <span class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></span>
                        </label>

                        <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-200 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                          <input type="radio" name="size" value="XXL" class="sr-only" aria-labelledby="size-6-label">

                          <span class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"></span>
                        </label>

                        <label class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-200 focus:outline-none sm:flex-1 bg-gray-50 text-gray-200 cursor-not-allowed">
                          <input type="radio" name="size" value="XXXL" disabled class="sr-only" aria-labelledby="size-7-label">
                          <span id="size-7-label"> XXXL </span>

                          <span aria-hidden="true" class="absolute -inset-px rounded-md border-2 border-gray-200 pointer-events-none">
                            <svg class="absolute inset-0 w-full h-full text-gray-200 stroke-2" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                              <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                            </svg>
                          </span>
                        </label>
                      </div>
                    </fieldset>


                  <div class="mt-6 inline-flex">
                    <button type="submit" class="mt-6 mr-10 bg-red-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-xl font-bold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Adicionar ao carrinho de compras
                    </button>
                    <button type="submit" class="mt-6 text-red-600 bg-white border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-xl font-bold hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                      Reservar já
                    </button>
                  </div>

                </form>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endforeach

@include('layouts.footer')
@endsection