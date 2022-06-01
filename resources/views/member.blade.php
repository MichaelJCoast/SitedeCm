<x-main>
<section class="container p-6 mx-auto mb-24">
    @foreach($dep as $key => $datadep)
    <h2 class="text-xl font-medium text-center capitalize md:text-2xl mt-6">{{$datadep->name}}</h2>

    <div class="flex items-center justify-center">
        <div class="grid gap-8 mt-8 grid-cols-2 sm:grid-cols-3">
        @foreach($team as $key => $data)
        @if($datadep->id ==$data->dep_id)
            <div class="w-full max-w-xs text-center">

                <img class="object-cover object-center w-full h-48 mx-auto rounded-lg" src="../laravel/{{$data->image}}"
                    alt="avatar" />

                <div class="mt-2">
                    <h3 class="text-lg font-medium">{{$data->nome}}</h3>
                    @foreach($role as $key => $datarole)
                    @if($datarole->id == $data->role_id)
                    <span class="mt-1 font-medium">{{$datarole->type}}</span>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach
        </div>
    </div>
    @endforeach
</section>
</x-main>