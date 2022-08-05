<template>
    <section class="container min-h-screen mx-auto px-8 md:px-12 mb-10 text-white">
        <h2 class="sm:mt-0 text-2xl 2xl:text-3xl font-semibold py-6">Equipa NECM</h2>
        <Loading v-if="loading"/>
        <div v-else-if="!loading && mandates.length" class="w-full max-w-xl px-2 py-16 sm:px-0 mx-auto">
            <TabGroup>
                <TabList class="flex space-x-1 rounded-xl bg-black p-1">
                    <Tab v-for="mandate in mandates" as="template" :key="mandate" v-slot="{ selected }">
                        <button :class="[
                            'w-full rounded-lg py-2.5 text-sm font-medium leading-5 text-white',
                            'ring-white ring-opacity-60 ring-offset-2 ring-offset-red-400 focus:outline-none focus:ring-2',
                            selected
                                ? 'bg-neutral-900 shadow'
                                : 'text-red-100 hover:bg-white/[0.12] hover:text-white',
                        ]">
                            {{ mandate.year }}
                        </button>
                    </Tab>
                </TabList>
                <TabPanels>
                    <TabPanel v-for="mandate in mandates" as="TabPanel" :key="mandate">
                    <div v-if="getTeamMembersByMandate(mandate)">
                        <div v-for="department in departments" :key="department.id">
                        <div v-if="getTeamMembersByDepartment(department, mandate).length" >
                            <h2 class="text-xl text-center font-semibold md:text-2xl mt-6">{{ department.name }}</h2>
                            <div class="grid gap-y-4 mt-8 grid-cols-1 sm:grid-cols-3 place-items-center">
                                <div v-for="team_member in team_members" :key="team_member.id"
                                    class="w-full max-w-xs space-y-4 text-center">
                                    <div v-if="department.id === team_member.dep_id && mandate.id === team_member.mandato_id">
                                    <img class="object-cover object-center w-[80%] h-auto mx-auto rounded-lg"
                                        :src="team_member.image" :alt="team_member.nome + ' photo'" />
                                    <h3 class="text-sm sm:text-lg font-semibold">{{ team_member.nome }}</h3>
                                    <div v-for="role in roles" :key="role.id">
                                        <span v-if="role.id == team_member.role_id"
                                            class="text-sm sm:text-lg text-red-500">
                                            {{ role.type }}
                                        </span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </TabPanel>
                </TabPanels>
            </TabGroup>
        </div>
    </section>
</template>

<script>
import { TabGroup, TabList, TabPanels, Tab, TabPanel } from '@headlessui/vue';
import Loading from "../components/Loading.vue";
import { useStore } from "vuex";
import { computed } from "vue";
export default {
    setup() {
        const store = useStore();
        store.dispatch("getTeamMembers");
        store.dispatch("getDepartments");
        store.dispatch("getRoles");
        store.dispatch("getMandates");
        return {
            team_members: computed(() => store.state.team.team_members),
            departments: computed(() => store.state.team.departments),
            roles: computed(() => store.state.team.roles),
            mandates: computed(() => store.state.team.mandates),
            loading: computed(() => store.state.team.loading),
        };
    },
    components: {
        TabGroup,
        TabList,
        TabPanels,
        Tab,
        TabPanel,
        Loading
    },
    methods: {
        // Get array with all team members based on mandate year
        getTeamMembersByMandate(mandate) {
            return this.team_members.filter(team_member => team_member.mandato_id == mandate.id);
        },
        // Get array with all team members based on department id
        getTeamMembersByDepartment(department, mandate) {
            return this.team_members.filter(team_member => team_member.dep_id == department.id && team_member.mandato_id == mandate.id);
        },      
    }
};
</script> 