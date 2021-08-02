import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from './pages/Home';
import Blog from './pages/Blog';
import About from './pages/About';

const router = new VueRouter ({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/about',
            name: 'about',
            component: About
        }
    ]
})

export default router;