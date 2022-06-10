<x-app-layout>
<head>
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
</head>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

<div class="container mx-auto px-4 sm:px-8 max-w-3xl">
    <div class="py-8">
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block w-full shadow rounded-lg overflow-hidden">
                <table class="w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3  border-b border-gray-200 text-white  text-left text-sm uppercase font-normal">
                                Produto
                            </th>
                            <th scope="col" class="px-5 py-3  border-b border-gray-200 text-white  text-left text-sm uppercase font-normal">
                                Tamanho
                            </th>
                            <th scope="col" class="px-5 py-3  border-b border-gray-200 text-white  text-left text-sm uppercase font-normal">
                                Quantidade
                            </th>
                            <th scope="col" class="px-5 py-3  border-b border-gray-200 text-white  text-left text-sm uppercase font-normal">
                                Preço
                            </th>
                            <th scope="col" class="px-5 py-3  border-b border-gray-200 text-white  text-left text-sm uppercase font-normal">
                                status
                            </th>
                        </tr>
                    </thead>

                            <?php $total=0; ?>
                        @foreach($order as $dataorder )
                            <?php   $idmerch=$dataorder->product;
                                    $merch = DB::table('merch')
                                    ->whereIn('id', [$idmerch] )
                                    ->get(); ?>
                            @foreach($merch as $key => $datamerch )
                        <tbody>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#" class="block relative">
                                            <img alt="profil" src="../../laravel/{{$datamerch->photo}}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                        </a>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-white whitespace-no-wrap">
                                            {{$datamerch->name}}
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
                                {{$dataorder->quantity}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-white whitespace-no-wrap">
                                {{$datamerch->price}}€
                                <?php $total=$total+$datamerch->price?>
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold text-white leading-tight">

                                    <span class="relative">
                                        <?php 
                                        if(($dataorder->status)==0){
                                            
                                            echo "precisa reservar";
                                        }
                                        elseif (($dataorder->status)==1){
                                            echo "precisa pagar";
                                        }
                                        elseif (($dataorder->status)==2){
                                            echo "precisa levantar";
                                        }
                                        else{
                                            echo "encomenda efetuada";
                                        }
                                        ?>
                                    </span>
                                </span>
                            </td>
                            <td class="border-b border-gray-200 text-sm">
                            <form action="order" method="get">
                            <input type="hidden" id="iddelete" name="iddelete" value="{{$dataorder->id}}">
                            
                            <button class="block text-white  hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit" data-modal-toggle="popup-modal">
                                <i class="las la-2x la-trash-alt"></i>
                            </button>
                            
                            </form>
                            </td>
                        </tr>
                    </tbody>

                @endforeach
                @endforeach

                        <tr> 
                            <td class="px-5 py-5 border-b border-gray-200  text-sm">
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-white whitespace-no-wrap">
                               Total:
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-white whitespace-no-wrap">
                                <?php echo "$total €" ?>
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">

                            <form action="fatura" method="get">
                                <button type="submit" class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Reservar Já</button>
                            </form>
                        </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>


</x-app-layout>