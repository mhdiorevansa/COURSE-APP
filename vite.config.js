import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/style.css",
                "resources/css/portal.css",
                "resources/css/responsive-admin.css",
                "resources/js/app.js",
                "resources/js/index-charts.js",
                "resources/js/chart.min.js",
            ],
            refresh: true,
        }),
    ],
});
