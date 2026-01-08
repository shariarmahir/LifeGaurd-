import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],

    css: {
        postcss: './postcss.config.js',
    },

    build: {
        outDir: 'public/build',      // Laravel default (CORRECT)
        emptyOutDir: true,           // Clean build directory
        manifest: true,              // Required for @vite()
        rollupOptions: {
            output: {
                manualChunks: undefined, // Prevent chunk splitting issues
            },
        },
    },

    server: {
        host: '127.0.0.1',
        port: 5173,
        strictPort: true,
    },
});
