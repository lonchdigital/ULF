import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',

                // 'resources/js/jquery.js',
                'resources/js/libs.js',
                'resources/js/main.js'
            ],
            refresh: true,
        }),
    ],
});
