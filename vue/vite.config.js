import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
<<<<<<< HEAD
  plugins: [vue()],
  devServer: {
    proxy: 'http://localhost:3000/',
}
=======
  plugins: [vue()]
>>>>>>> 1cb0577 (Vue 3 installation)
})
