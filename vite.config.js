import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import { defineConfig } from 'vite';

  export default defineConfig({
  server: {
    https: true,
  },
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/css/styles.css',
        'resources/css/leaflet.css', 
        'resources/js/app.js',
        'resources/js/leaflet.js'
      ],
      refresh: true,
    }),
  ],
  // 他の設定...
  optimizeDeps: {
    include: ['leaflet'],
  },
});
