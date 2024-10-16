import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/Home.vue';
import Blog from '../views/Blog.vue';
import Team from '../views/Team.vue';
import Merch from '../views/Merch.vue';
import Links from '../views/Links.vue';
import About from '../views/About.vue';
import BlogPost from '../views/BlogPost.vue';
import Product from '../views/Product.vue';
import Cart from '../views/Cart.vue';
import VerifyOrder from "../views/VerifyOrder.vue";
import DefaultLayout from "../components/DefaultLayout.vue";
import NotFound from "../views/NotFound.vue";

const routes = [
    {
        path: '/',
        component: DefaultLayout,
        children: [
            { path: "/", name: "Home", component: Home },
            { path: "/sobre", name: "About", component: About },
            { path: "/blog", name: "Blog", component: Blog },
            { path: "/blog/:slug", name: "BlogPost", component: BlogPost },
            { path: "/merch/:id", name: "Product", component: Product },
            { path: "/merch", name: "Merch", component: Merch },
            { path: "/equipa", name: "Team", component: Team },
            { path: "/links", name: "Links", component: Links },
            { path: "/carrinho", name: "Cart", component: Cart },
          ],
    },
    {
        path: '/:catchAll(.*)',
        name: 'NotFound',
        component: NotFound,
    },
    {
        path: "/verify-order/:token",
        name: "VerifyOrder",
        component: VerifyOrder
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router; 