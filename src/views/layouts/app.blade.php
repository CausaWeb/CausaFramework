<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ $csrf_token }}">
	<meta name="robots" content="index, follow">
	<meta name="author" content="Developed by CausaWeb - https://causaweb.pe">
	<meta name="keywords" content="{{ $keywords }}">
	<meta name="description" content="{{ $description }}">
	<meta name="canonical" content="{{ $canonical }}">
	<base href="{{ $appUrl }}">
	<title>@yield('title', $appTitle)</title>
	<link rel="icon" href="favicon.svg" type="image/svg+xml">
	<link rel="icon" href="favicon.png" type="image/png">
	<link rel="apple-touch-icon" href="favicon.png">

	@vite()

</head>

<body>
	<section id="body" class="container">
		@include('parts.navigation')

		<main id="app-content">
			@yield('content')
		</main>

		@include('parts.footer')
	</section>

	<div id="htmx-loader" class="htmx-indicator"></div>

	<script src="js/gsap.3.13.0/gsap.js"></script>
	<script src="js/gsap.3.13.0/scrollTo.js"></script>
	<script src="js/gsap.3.13.0/scrollTrigger.js"></script>
	<script src="js/gsap.3.13.0/splitText.js"></script>
	<script src="js/gsap.3.13.0/textPlugin.js"></script>
	<script src="js/alpine.3.15.0.js" defer></script>
</body>

</html>
