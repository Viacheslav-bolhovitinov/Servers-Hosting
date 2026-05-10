import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import tailwindcss from '@tailwindcss/vite';

const isPreview = process.env.VITE_PREVIEW === 'true';

export default defineConfig({
    base: '/',
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'],
            refresh: true,
        }),
        react(),
        tailwindcss(),
    ],
    server: {
        port: 5173,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
    preview: {
        port: 4173,
        strictPort: true,
        historyApiFallback: true,
    },
    build: {
        manifest: !isPreview,
        outDir: isPreview ? 'public/build' : 'public/build',
        rollupOptions: {
            input: isPreview
                ? { index: 'index.html' }
                : {
                      app: 'resources/js/app.jsx',
                      css: 'resources/css/app.css',
                  },
        },
    },
});
