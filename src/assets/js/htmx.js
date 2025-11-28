// set csrf token for all HTMX requests
document.addEventListener('htmx:configRequest', function (event) {
	const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
	if (token) {
		event.detail.headers['X-CSRF-TOKEN'] = token;
	}
});
