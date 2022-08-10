<template>
    <Transition name="switchIcon">
        <component @click="toggleTheme()" :is="themeIcon"></component>
    </Transition>
</template>

<script>
import { MoonIcon, SunIcon } from "@heroicons/vue/solid";

export default {
    mounted() {
        const initUserMode = this.getTheme() || this.getModePreference();
        this.setTheme(initUserMode);
    },

    data() {
        return {
            userTheme: "light",
            themeIcon: MoonIcon,
        }
    },
    methods: {
        toggleTheme() {
            const activeTheme = localStorage.getItem("user-theme");
            if (activeTheme === "light") {
            this.setTheme("dark");
            } 
            else { this.setTheme("light"); }
            this.emitter.emit("changeTheme", this.userTheme);
        },
        getTheme() {
            return localStorage.getItem("user-theme");
        },
        setTheme(theme) {
            localStorage.setItem("user-theme", theme);
            this.userTheme = theme;
            document.documentElement.className = theme;
            if (theme === 'dark') {
            this.themeIcon = MoonIcon;
            }
            else { this.themeIcon = SunIcon; }
        },
        getModePreference() {
            const hasDarkPreference = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (hasDarkPreference) {
                return "dark";
            } else {
                return "light";
            }
        }
    },
    components: {
        MoonIcon,
        SunIcon
    },
};
</script>

<style scoped>
.switchIcon-enter-active {
    animation: animate .3s cubic-bezier(0.4, 0.0, 0.2, 1);
}

@keyframes animate {
    0%   { transform: scale(1); }
    50%  { transform: scale(0); }
    100% { transform: scale(1); }
}
</style>