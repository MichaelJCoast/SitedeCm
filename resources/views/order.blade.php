<x-main>

@php
if(!isset($_GET['id'])){  }else{ };
if(!isset($_GET['size'])){  }else{ };
@endphp





<div class="container mx-auto px-4 sm:px-8 max-w-3xl">
    <div class="py-8">
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block w-full shadow rounded-lg overflow-hidden">
                <table class="w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3  border-ba border-gray-200 text-white  text-left text-sm uppercase font-normal">
                                Produto
                            </th>
                            <th scope="col" class="px-5 py-3  border-b border-gray-200 text-white  text-left text-sm uppercase font-normal">
                                Tamanho
                            </th>
                            <th scope="col" class="px-5 py-3  border-b border-gray-200 text-white  text-left text-sm uppercase font-normal">
                                Preço
                            </th>
                            <th scope="col" class="px-5 py-3  border-b border-gray-200 text-white  text-left text-sm uppercase font-normal">
                                status
                            </th>
                        </tr>
                    </thead>
                    @foreach($merch as $key => $data)
                    <tbody>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#" class="block relative">
                                            <img alt="profil" src="{{$data->photo}}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                        </a>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-white whitespace-no-wrap">
                                        {{$data->name}}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-white whitespace-no-wrap">
                                    @php echo $_GET['size'] @endphp
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-white whitespace-no-wrap">
                                {{$data->price}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                    </span>
                                    <span class="relative">
                                    carrinho
                                    </span>
                                </span>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach


                        <tr>
                                <td>
                                    <h1> base de dados </h1>
                                </td>
                            </tr>
                        @foreach($order as $key => $dataorder )
                        <tbody>
                        <tr> 
                            <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#" class="block relative">
                                            <img alt="profil" src="{{$data->photo}}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                        </a>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-white whitespace-no-wrap">
                                        o user {{$dataorder->user}} requisitou o {{$dataorder->product}}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-white whitespace-no-wrap">
                                {{$dataorder->size}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-white whitespace-no-wrap">
                                {{$data->price}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                    </span>
                                    <span class="relative">
                                    {{$dataorder->status}}
                                    </span>
                                </span>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



</x-main>
