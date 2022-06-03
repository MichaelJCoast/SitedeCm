<x-app-layout>
<section class="container p-6 mx-auto mb-24">
    @foreach($dep as $department)
    <h2 class="text-xl font-medium text-center capitalize md:text-2xl mt-6">{{$department->name}}</h2>

    <div class="flex items-center justify-center">
        <div class="grid gap-8 mt-8 grid-cols-2 sm:grid-cols-3">
        @foreach($team as $team_member)
        @if($department->id == $team_member->dep_id)
            <div class="w-full max-w-xs text-center">

                <img class="object-cover object-center w-full h-48 mx-auto rounded-lg" src="../laravel/{{$team_member->image}}"
                    alt="avatar" />

                <div class="mt-2">
                    <h3 class="text-lg font-medium">{{$team_member->nome}}</h3>
                    @foreach($roles as $role)
                    @if($role->id == $team_member->role_id)
                    <span class="mt-1 font-medium">{{$role->type}}</span>
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