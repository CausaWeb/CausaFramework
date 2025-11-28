import { defineConfig } from 'vite'
import liveReload from 'vite-plugin-live-reload'
import path from 'path'

const APP_URL = 'http://localhost:8000';

export default defineConfig({
	plugins: [
		liveReload([
			'./src/views/**/*.php',
			'./public/css/**/*.css',
			'./public/js/**/*.js',
		], {
			alwaysReload: true,
		}),
		{
			name: 'php-server-info',
			configureServer(server) {
				server.httpServer?.once('listening', () => {
					setTimeout(() => {
						const address = server.httpServer?.address();
						const isAddressInfo = (addr) => typeof addr === 'object';

						if (isAddressInfo(address)) {
							const port = address.port;
							console.log(`  ➜  App: ${APP_URL}`);
						}
					}, 100);
				});
			},
		},
	],
	server: {
		proxy: {
			'./public': APP_URL, // Replace with your PHP server URL
		},
		host: true,
	},
	build: {
		outDir: './public/assets',   // compiled output goes here
		assetsDir: '',               // 👈 prevents nested "assets" folder
		manifest: true,              // manifest.json will be at public/assets/manifest.json
		rollupOptions: {
			input: {
				app: path.resolve(__dirname, './src/assets/js/app.js'),
				styles: path.resolve(__dirname, './src/assets/css/app.css'),
			},
		},
	},
	publicDir: false,              // 👈 disables copying public/ into outDir
})
