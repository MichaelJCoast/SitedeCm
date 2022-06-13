<x-app-layout>

<h1 class="text-center text-white px-3 py-10 rounded-md text-4xl font-bold"> E-Mails Disponíveis</h1>

    <form  class="text-white pt-5" action="mail" method="get">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 px-10 ">
        @foreach($mail as $key => $mail )
        @if ($mail->name == 'fatura') @continue; @endif
        <div class="px-10 py-10">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-2xl leading-tight font-medium mb-2">{{$mail->title}}</h5>
                    <p class="text-gray-700 text-base mb-4">{{$mail->body}} </p>
                    <p class="text-gray-700 text-base mb-4">{{$mail->msg}} </p>
                    <p class="text-gray-700 text-base mb-4">{{$mail->footer}} </p>
                        <input type="hidden" name="id"  value="{{$mail->id}}"></input>
                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="button">
                            Enviar Para Todos
                        </button>
                </div>
            </div>
                @endforeach
                
            </div>
    </form>
</x-app-layout>