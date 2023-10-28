import "./styles/app.css";
import { createApp } from "vue";
import App from "./js/App.vue";
import { registerVueControllerComponents } from '@symfony/ux-vue';

createApp(App).mount("#vue-app");

registerVueControllerComponents(require.context('./vue/controllers', true, /\.vue$/));