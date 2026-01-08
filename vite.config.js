import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
      ],
      refresh: true,
      // If you want manifest for Laravel blade, keep manifest true
      // manifest: true,
    }),
  ],

  css: {
    postcss: './postcss.config.js',
  },

  build: {
    // Use `dist` for Vercel compatibility
    outDir: 'dist',
    emptyOutDir: true,
    manifest: true,           // Laravel needs manifest for @vite()
    rollupOptions: {
      output: {
        manualChunks: undefined,
      },
    },
  },

  server: {
    host: '0.0.0.0', // allow network access if needed
    port: 5173,
    strictPort: true,
  },

  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'),
    },
  },
});
