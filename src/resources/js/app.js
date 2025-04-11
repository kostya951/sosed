import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.min.js';
import '../css/app.css';
import '../css/my.css';
import './images'
import {createApp} from 'vue/dist/vue.esm-bundler';
import SignupForm from './components/SignupForm.vue';
import LoginForm from './components/LoginForm.vue';
import DiscussionFilter from './components/DiscussionFilter.vue'

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp({});
app.component('signup-form',SignupForm);
app.component('login-form',LoginForm);
app.component('discussion-filter',DiscussionFilter);
app.mount('#app');

