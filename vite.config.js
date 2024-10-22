import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
          input: ['resources/css/app.css', 
                  'resources/js/app.js',
                  'resources/css/main.css',
                  'resources/js/main.js'],
            refresh: true,
        }),
    ],
    //base: 'http://localhost:8000/',
  
    //server: {
    //    proxy: {
    //        '/': 'http://localhost:8000',
    //    },
    //},

    build: {
        outDir: 'public',
        assetDir: 'build',
    }, 
});
