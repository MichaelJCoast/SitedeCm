<template>
    <section class="min-h-screen container mx-auto text-white">
        <div v-for="department in departments" :key="department.id">
            <h2 class="text-xl text-center font-semibold md:text-2xl mt-6">{{ department.name }}</h2>
            <div class="grid gap-y-4 mt-8 grid-cols-1 sm:grid-cols-3 place-items-center">
                <div v-for="team_member in team_members" :key="team_member.id"
                    v-show="department.id === team_member.dep_id" class="w-full max-w-xs space-y-4 text-center">
                    <img class="object-cover object-center w-[80%] h-auto mx-auto rounded-lg" :src="team_member.image"
                        :alt="team_member.nome + ' photo'" />
                    <h3 class="text-sm sm:text-lg font-semibold">{{ team_member.nome }}</h3>
                    <div v-for="role in roles" :key="role.id">
                        <span v-if="role.id == team_member.role_id" class="text-sm sm:text-lg text-red-500">
                            {{ role.type }}
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