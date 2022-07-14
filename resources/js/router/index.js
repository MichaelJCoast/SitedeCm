import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/Home.vue';
import Blog from '../views/Blog.vue';
import Team from '../views/Team.vue';
import Links from '../views/Links.vue';
import BlogPost from '../views/BlogPost.vue'
import DefaultLayout from "../components/DefaultLayout.vue";

const routes = [
    {
        path: '/',
        component: DefaultLayout,
        children: [
            { path: "/", name: "Home", component: Home },
            { path: "/blog", name: "Blog", component: Blog },
            { path: "/blog/:slug", name: "BlogPost", component: BlogPost },
            { path: "/equipa", name: "Team", component: Team },
            { path: "/links", name: "Links", component: Links },
          ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router; 