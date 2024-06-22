import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import App from './components/App.vue';
import axios from 'axios';

const app = createApp({});

app.component('app', App);

app.mount('#app');

app.config.globalProperties.$axios = axios;