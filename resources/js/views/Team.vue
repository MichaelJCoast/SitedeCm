<template>
    <section class="container min-h-screen p-6 mx-auto mb-24 text-white">
    <h2 v-for="department in departments"
                :key="department.id"
                class="text-xl text-center font-semibold md:text-2xl mt-6">{{department.name}}</h2>

    <div class="flex items-center justify-center">
        <div v-for="team_member in team_members"
                    :key="team_member.id"
        class="grid gap-8 mt-8 grid-cols-3">
            <div v-if="departments.id == this.$.vnode.key" class="w-full max-w-xs text-center">
                <img class="object-cover object-center w-full h-auto mx-auto rounded-lg" :src="team_member.image"
                    alt="avatar" />
                <div v-for="role in roles" 
                    :key="role.id"
                    class="mt-2">
                    <h3 class="text-sm sm:text-lg font-semibold">{{team_member.nome}}</h3>
                    <span v-if="role.id == team_member.role_id" class="mt-1 text-sm sm:text-lg text-red-500">
                        {{role.type}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
import { useStore } from "vuex";
import { computed } from "vue";
export default {
    setup() {
        const store = useStore();
        store.dispatch("getTeamMembers");
        store.dispatch("getDepartments");
        store.dispatch("getRoles");
        return {
            team_members: computed(() => store.state.team.team_members),
            departments: computed(() => store.state.team.departments),
            roles: computed(() => store.state.team.roles),
        };
    },
};
</script> 