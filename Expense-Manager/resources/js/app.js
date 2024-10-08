import 'bootstrap/dist/css/bootstrap.min.css';
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import MainLayout from "./Pages/Layouts/MainLayout.vue";

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue");

        // Use the name directly without template literals
        const page = pages[`./Pages/${name}.vue`];

        // Check if the page exists before calling it
        if (page) {
            const component = await page(); // Call the function to get the component
            component.default.layout = component.default.layout || MainLayout;
            return component;
        } else {
            console.error(`Page not found: ${name}`);
            // Optionally, handle the case where the page doesn't exist
            return null;
        }
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    }
});
