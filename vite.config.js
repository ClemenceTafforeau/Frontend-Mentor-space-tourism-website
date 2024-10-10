import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [vue()],
  build: {
    rollupOptions: {
      input: {
        crew: 'public/crew.html',
        destination: 'public/destination.html',
        technology: 'public/technology.html',
      },
    },
  },
  css: {
    preprocessorOptions: {
      css: {
      }
    }
  },
  resolve: {
    alias: {
      '@': '/src',
    },
  },
});
