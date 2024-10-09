import 'bootstrap/dist/css/bootstrap.min.css';
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import MainLayout from "./Pages/Layouts/MainLayout.vue";
import LoginLayout from "./Pages/Layouts/LoginLayout.vue";
import UserLayout from "./Pages/Layouts/UserLayout.vue";

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue");
        const page = pages[`./Pages/${name}.vue`];

        if (page) {
            const component = await page();
            component.default.layout = component.default.layout || MainLayout;
            const userRole = sessionStorage.getItem('user_role');
            
            if (name === 'Login') {
                component.default.layout = LoginLayout; 
            } else if (userRole === 'Administrator') {
                component.default.layout = MainLayout;
            } else if (userRole === 'User') {
                component.default.layout = UserLayout;
            }

            return component;
        } else {
            console.error(`Page not found: ${name}`);
            return null;
        }
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    }
});
