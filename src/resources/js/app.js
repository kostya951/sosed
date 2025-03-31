import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.min.js';
import '../css/app.css';
import '../css/my.css';
import './images'
import {createApp} from 'vue/dist/vue.esm-bundler';
import TestComponent from './components/TestComponent.vue';

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp({});
app.component('test-component',TestComponent);
app.mount('#app');

