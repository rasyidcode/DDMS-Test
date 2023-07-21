import { createRouter, createWebHashHistory } from "vue-router";
import HomeView from '../views/HomeView.vue';
import TaskOneView from '../views/TaskOneView.vue';
import TaskTwoView from '../views/TaskTwoView.vue';
import TaskThreeView from '../views/TaskThreeView.vue';

const routes = [
    { path: '/', component: HomeView },
    { path: '/task-one', component: TaskOneView },
    { path: '/task-two', component: TaskTwoView },
    { path: '/task-three', component: TaskThreeView }];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

export default router;