import Vue from "vue";
// sample用
import VueRouter from 'vue-router';
import HeaderComponent from "./components/sample/HeaderComponent";
import TaskListComponent from "./components/sample/TaskListComponent";
import TaskCreateComponent from "./components/sample/TaskCreateComponent";
import TaskShowComponent from "./components/sample/TaskShowComponent";
import TaskEditComponent from "./components/sample/TaskEditComponent";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/tasks', //←urlでアクセスするとTaskListComponentを表示する
            name: 'task.list',
            component: TaskListComponent
        },

        {
            path: '/tasks/:create', //←urlでアクセスするとTaskCreateComponentを表示する
            name: 'task.create',
            component: TaskCreateComponent,
            props: true
        },
        {
            path: '/tasks/:taskId', //←urlでアクセスするとTaskShowComponentを表示する
            name: 'task.show',
            component: TaskShowComponent,
            props: true
        },
        {
            path: '/tasks/:taskId/edit', //←urlでアクセスするとTaskShowComponentを表示する
            name: 'task.edit',
            component: TaskEditComponent,
            props: true
        },
    ]
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', HeaderComponent);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
