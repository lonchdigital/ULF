import { resolve } from 'path';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    resolve: {
        alias: {
            $img: resolve('./resources/img'),
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',

                'resources/js/app.js',
                'resources/js/libs.js',
                'resources/js/main.js',

                // Modules
                'Modules/Articles/resources/js/articles-catalog.js',

                'Modules/Cars/resources/js/cars-catalog.js',
                'front/src/js/modules/filter.js'
            ],
            refresh: true,
        }),
    ],
});
