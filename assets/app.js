import "./styles/app.css";
import { createApp } from "vue";
import App from "./js/App.vue";
import { registerVueControllerComponents } from "@symfony/ux-vue";
import "./styles/app.scss";
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.bundle';

//vueJS
createApp(App).mount("#vue-app");
registerVueControllerComponents(require.context("./vue/controllers", true, /\.vue$/));

//bootstrap
require("bootstrap");

//fontawesome
require("@fortawesome/fontawesome-free/css/all.min.css");
require("@fortawesome/fontawesome-free/js/all.js");

// <i class="fa-solid fa-house"></i>;
