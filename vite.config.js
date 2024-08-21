import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/purchased.scss',
                'resources/sass/exit.scss',
                'resources/js/app.js',
                'resources/css/home.css',
                'resources/css/credit.css',
                'seat-select.css'
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost'
        }
    }
});
