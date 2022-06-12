require('./bootstrap');

import { createApp } from 'vue'

import store from './store'

import App from './components/ExampleComponent.vue';
import ProductAdd from './components/products/AddComponent.vue';

const app = createApp({});

app.component('app', App)
app.component('productadd', ProductAdd)

app.mount('#app',store)


