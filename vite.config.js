import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/main.scss',
                'resources/js/app.js',
                'resources/js/donate.js',
                'resources/js/leaderboard.js',
                'resources/js/server_status.js',
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
                host: '127.0.01',
                port: 8000
            }
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources',
        },
    },
});
