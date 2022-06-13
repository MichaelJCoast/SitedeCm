<x-app-layout>

<h1 class="text-white font-bold pt-10"> que email quer enviar </h1>

    <form  class="text-white pt-5" action="mail" method="get">

        @foreach($mail as $key => $mail )
        @if ($mail->name == 'fatura') @continue; @endif
    
        <input type="checkbox" name="id" value="{{$mail->id}}">{{$mail->title}}</input><br>
        @endforeach

        <input class="border mt-5" type="submit">
    </form>
</x-app-layout>