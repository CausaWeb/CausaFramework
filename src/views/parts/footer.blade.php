<footer class="border-t border-gray-300 mt-8 footer">
	<section>
		<div class="footer-img flex flex-col justify-center items-center">
			<img src="img/logo.svg" class="footer-logo" alt="Logo">

			<p class="mt-4">@ 2025 - Developed by <a href="https://wpe.net.pe" target="_blank" class="text-blue-400">WPE.net.pe</a></p>
		</div>

		<div>
			<div class="bottom-links">
				<nav class="flex flex-col items-center">
					<div class="flex flex-col text-left">
						@foreach ($appLinks as $i)
						@navlink($i['url'])
						{{ $i['label'] }}
						@endnavlink
						@endforeach
					</div>
				</nav>
			</div>
		</div>
	</section>
</footer>