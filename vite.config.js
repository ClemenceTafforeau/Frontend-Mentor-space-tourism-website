import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import vueDevTools from 'vite-plugin-vue-devtools';

export default defineConfig({
  plugins: [
    vue(),
    vueDevTools({
      launchEditor: 'code'
    }),
  ],
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
