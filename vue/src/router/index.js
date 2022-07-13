import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/Home.vue';
import Blog from '../views/Blog.vue';
import Team from '../views/Team.vue';
import Links from '../views/Links.vue';
import BlogPost from '../views/BlogPost.vue'
import DefaultLayout from "../components/DefaultLayout.vue";

import store from "../store";

const routes = [
    {
        path: '/',
        component: DefaultLayout,
        meta: { requiresAuth: false },
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

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
      next({ name: "Login" });
    } else if (store.state.user.token && (to.meta.isGuest === 'Login' || to.meta.isGuest == 'Register')) {
      next({name: 'Home'});
    }
    else {
        next();
    }
  });

export default router;