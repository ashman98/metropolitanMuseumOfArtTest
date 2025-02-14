import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            buildDirectory: 'build',
        }),
        vue(),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',  // Добавление алиаса для удобных импортов
        },
    },
    build: {
        outDir: 'public/build',  // Папка для выходных файлов
        manifest: true,
        emptyOutDir: true,
        rollupOptions: {
            output: {
                assetFileNames: 'assets/[name]-[hash][extname]',
            }
        },
        minify: 'esbuild',
    },
    server: {
        host: '127.0.0.1',
        port: 5173,
        strictPort: true,
        cors: true, // Разрешаем CORS
        hmr: {
            host: '127.0.0.1',
        },
    }
});
