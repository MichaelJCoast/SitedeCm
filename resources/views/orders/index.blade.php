<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                                Pedido #
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                        <?php    $pedidos = DB::table('order')
                                                ->whereIn('user',  [Auth::id()] )
                                                ->where('status','!=', 0)
                                                ->get();?>

                                        @foreach ($pedidos as $key => $pedido)

                                        <?php   $idmerch=$pedido->product;
                                                $merch = DB::table('merch')
                                                ->whereIn('id', [$idmerch] )
                                                ->get(); ?>
                                            @foreach($merch as $key => $merch )

                                        <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            PEDIDO #{{$pedido->id}} -> {{$merch->name}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$merch->price}}€ ->   
                                    <?php 
                                        if (($pedido->status)==1){
                                            echo "precisa pagar";
                                        }
                                        elseif (($pedido->status)==2){
                                            echo "precisa levantar";
                                        }
                                        else{
                                            echo "encomenda efetuada";
                                        }
                                        ?>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>