<x-app-layout>
    {{-- <form method="get" action="/order">
  <input type="hidden" id="userId" name="id" value="{{ $product->id }}">
    <!-- Sizes -->
    <div class="mt-10">
        <div class="flex items-center justify-between">
            <h4 class="text-sm text-white font-medium">Tamanho</h4>
        </div>
        <div class="mt-6 inline-flex">
            <button type="submit"
                class="mt-6 mr-10 bg-red-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-xl font-bold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Adicionar ao carrinho de compras
            </button>
            <button type="submit"
                class="mt-6 text-red-600 bg-white border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-xl font-bold hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Reservar já
            </button>
        </div>
        </form> --}}
        @foreach($merch as $product)

            <div class="container mx-auto mb-6 lg:mt-6">
              <form method="get" action="/order">
                <input type="hidden" id="userId" name="id" value="{{ $product->id }}">
                <div class="grid grid-flow-row lg:grid-flow-col">
                  <img class="h-96 mx-auto" src="../{{ $product->photo }}" alt="">
                    {{-- Product Information --}}
                    <div class="text-white mt-6 px-8 md:px-14 space-y-4 md:w-3/4">
                        <h2 class="font-semibold text-xl">{{ $product->name }}</h2>
                        <p class="text-gray-400">{!! $product->description !!}</p>
                        <p class="font-semibold text-lg">{{number_format((float)$product->price, 2, '.', '')}}€</p>
                        <?php if($product->size==1){ ?>
                        <div class="grid grid-cols-5 gap-0">
                            <x-product-size>XS</x-product-size>
                            <x-product-size>S</x-product-size>
                            <x-product-size>M</x-product-size>
                            <x-product-size>L</x-product-size>
                            <x-product-size>XL</x-product-size>
                        </div>
                        <?php }; ?>
                        <button type="submit" class="p-4 rounded-md uppercase bg-red-700 hover:brightness-125">
                            <p class="font-bold text-gray-100">Reservar já</p>
                        </button>
                    </div>
                  </div>
                </form>
                    {{-- FAQ --}}
              </div>
        @endforeach
</x-app-layout>
