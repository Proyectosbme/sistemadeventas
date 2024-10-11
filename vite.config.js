import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'curso/resources/sass/app.scss',
                'curso/resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
