<x-app-layout>
<section class="container p-6 mx-auto mb-24 text-white">
    @foreach($dep as $department)
    <h2 class="text-xl text-center font-semibold md:text-2xl mt-6">{{$department->name}}</h2>

    <div class="flex items-center justify-center">
        <div class="grid gap-8 mt-8 grid-cols-3">
        @foreach($team as $team_member)
        @if($department->id == $team_member->dep_id)
            <div class="w-full max-w-xs text-center">
                <img class="object-cover object-center w-full h-auto mx-auto rounded-lg" src="../laravel/{{$team_member->image}}"
                    alt="avatar" />
                <div class="mt-2">
                    <h3 class="text-sm sm:text-lg font-semibold">{{$team_member->nome}}</h3>
                    @foreach($roles as $role)
                    @if($role->id == $team_member->role_id)
                    <span class="mt-1 text-sm sm:text-lg text-red-500">{{$role->type}}</span>
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
</x-app-layout>