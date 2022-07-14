<x-app-layout>
    <div class="container mx-auto max-w-3xl mt-6">
                <table class="bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th scope="col" class="px-5 py-3 text-left text-sm font-semibold">
                                Produto
                            </th>
                            <th scope="col" class="px-5 py-3 text-left text-sm font-semibold">
                                Tamanho
                            </th>
                            <th scope="col" class="px-5 py-3 text-left text-sm font-semibold">
                                Quantidade
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-semibold">
                                Preço
                            </th>
                            <th scope="col" class="px-5 py-3 text-left text-sm font-semibold">
                                Estado
                            </th>
                            <th scope="col" class="px-5 py-3 text-left text-sm font-semibold">
                                Remover
                            </th>
                        </tr>
                    </thead>

                            <?php $total = 0;?>
                        @foreach($order as $order_data )
                            <?php $idmerch = $order_data->product;
$merch = DB::table('merch')
    ->whereIn('id', [$idmerch])
    ->get();?>
                            @foreach($merch as $key => $datamerch )
                        <tbody>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#" class="block relative">
                                            <img alt="profil" src="{{$datamerch->photo}}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                        </a>
                                    </div>
                                    <div class="ml-3">
                                        <p class="whitespace-no-wrap">
                                            {{$datamerch->name}}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class=" whitespace-no-wrap">
                                {{$order_data->size}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class=" whitespace-no-wrap">
                                {{$order_data->quantity}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class=" whitespace-no-wrap">
                                {{$datamerch->price}}€
                                <?php $total = $total + $datamerch->price?>
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold  leading-tight">

                                    <span class="relative">
                                        <?php
if (($order_data->status) == 0) {

    echo "Reserva Pendente";
} elseif (($order_data->status) == 1) {
    echo "Pagamento Pendente";
} elseif (($order_data->status) == 2) {
    echo "Levantamento Pendente";
} else {
    echo "encomenda efetuada";
}
?>
                                    </span>
                                </span>
                            </td>
                            <td class="border-b border-gray-200 text-sm">
                            <form action="order" method="get">
                            <input type="hidden" id="iddelete" name="iddelete" value="{{$order_data->id}}">
                            <button class="hover:bg-red-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm p-3 text-center" type="submit" data-modal-toggle="popup-modal">

                            </button>

                            </form>
                            </td>
                        </tr>
                    </tbody>

                @endforeach
                @endforeach

                        <tr>
                            <td class="px-5 py-5text-sm">
                            </td>
                            <td class="px-5 py-5 text-sm">
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <p class=" whitespace-no-wrap">
                               Total:
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <p class=" whitespace-no-wrap">
                                <?php echo "$total" . "€" ?>
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm">

                            <form action="fatura" method="get">
                                <button type="submit" class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Reservar Já</button>
                            </form>
                        </td>
                        </tr>
                    </tbody>

                </table>
            </div>
</x-app-layout>