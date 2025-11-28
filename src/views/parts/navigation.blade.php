<header class="fjbic top-nav">
	@navlink('/')
	<img src="img/logo.svg" id="top-logo" alt="Logo">
	@endnavlink

	<nav class="fjbic">
		@foreach ($headerLinks as $i)
		<div class="top-links">
			@navlink($i['url'])
			{{ $i['label'] }}
			@endnavlink
		</div>
		@endforeach
	</nav>
</header>