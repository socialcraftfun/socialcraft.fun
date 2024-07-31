import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/main.scss',
                'resources/js/app.js',
                'resources/js/donate.js',
            ],
            refresh: [
                {
                    paths: [

                        'resources/routes/**',
                        'routes/**',
                        'resources/views/**',
                    ],
                    config: {delay: 300}
                }
            ],
            server: {
                host: 'localhost',
                port: 8000
            }
        }),
    ],
});
