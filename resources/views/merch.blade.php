@extends('layouts.main')

@section('content')

<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-2xl font-extrabold tracking-tight dark:text-white" id="produtos" >Produtitos</h2>

    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
      <div class="group relative">


      <!-- DIV IMAGEM -->
      <div class="w-full min-h-50 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75  transform transition duration-500 group-hover:scale-110  lg:h-80 lg:aspect-none">
      <a href="#">
          <img src="http://media.gucci.com/style/DarkGray_Center_0_0_2400x2400/1620743404/454585_X5J57_9541_001_100_0000_Light.jpg" class="w-full h-full object-center object-cover lg:w-full lg:h-full ">
        </div>
        </a>
        <!-- BLOCO COM TUDO -->
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700 dark:text-white">
                <span aria-hidden="true" class="absolute inset-0 "></span>
                Gucci Sweat
            </h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-white">White</p>
          </div>
          <p class="text-sm font-medium text-gray-900 dark:text-white">$750</p>
        </div>
        <div style="position:absolute; margin-top:-26px; margin-left:165px">
        </div>
        </div>

        

<div class="group relative">
        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75  transform transition duration-500 group-hover:scale-110  lg:h-80 lg:aspect-none">
          <img src="https://cdn.childrensalon.com/media/catalog/product/b/a/balenciaga-blue-logo-printed-t-shirt-333414-02bbb311e9094ed7f312f9d38f71fea8feb68573.jpg" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700 dark:text-white">
              <a href="#">
                <span aria-hidden="true" class="absolute inset-0"></span>
                Balenciaga Tee
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-white">Blue</p>
          </div>
          <p class="text-sm font-medium text-gray-900 dark:text-white">$99</p>
        </div>
        <div style="position:absolute; margin-top:-26px; margin-left:165px">
        </div>
        </div>

        <div class="group relative">
        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75  transform transition duration-500 group-hover:scale-110  lg:h-80 lg:aspect-none">
          <img src="https://wwws.dior.com/couture/ecommerce/media/catalog/product/cache/1/cover_image_mobile_2/715x773/17f82f742ffe127f42dca9de82fb58b1/6/n/1594400521_0SBS21SHOA_Y43I_E02_GHC.jpg" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700 dark:text-white">
              <a href="#">
                <span aria-hidden="true" class="absolute inset-0"></span>
                Dior
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-white">Black</p>
          </div>
          <p class="text-sm font-medium text-gray-900 dark:text-white">$200</p>
        </div>
        <div style="position:absolute; margin-top:-26px; margin-left:165px">
        </div>
        </div>

        
        <div class="group relative">
        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75  transform transition duration-500 group-hover:scale-110  lg:h-80 lg:aspect-none">
          <img src="https://assets.burberry.com/is/image/Burberryltd/e301d5f1deb95e58167292044bfbeb27f592181f.jpg?$BBY_V2_SL_1x1$&wid=2500&hei=2500" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700 dark:text-white">
              <a href="#">
                <span aria-hidden="true" class="absolute inset-0"></span>
                tshirt
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-white">Black</p>
          </div>
          <p class="text-sm font-medium text-gray-900 dark:text-white">$80</p>
        </div>
        <div style="position:absolute; margin-top:-26px; margin-left:165px">
        </div>
        </div>


     
        </div>
        






    <footer class="p-4 shadow md:flex md:items-center md:justify-between md:p-6 bg-black">
    <span class="text-sm sm:text-center text-white"><a href="#" class="hover:underline">Núcleo de Estudantes de Comunicação e Multimédia</a>
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-smtext-gray-400 sm:mt-0">
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6 ">Facebook</a>
        </li>
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Instagram</a>
        </li>
        <li>
            <a href="#" class="hover:underline">Contacta-nos</a>
        </li>
    </ul>
</footer>


@endsection