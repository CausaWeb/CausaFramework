<?php

namespace App\Services;

use eftec\bladeone\BladeOne;

class BladeServiceProvider
{
	public static function register(BladeOne $blade, string $currentPath, int $vitePort = 5173): void
	{
		// blade globals
		$blade->share(self::getGlobals($currentPath));

		// directives
		$blade->directive('navlink', function ($expression) {
			return "<?php
        \$href = {$expression} ?: '/';
    ?>
    <a href=\"<?php echo \$href; ?>\"
       hx-get=\"<?php echo \$href; ?>\"
       hx-target=\"#app-content\"
       hx-push-url=\"true\"
	   hx-indicator=\"#htmx-loader\">";
		});

		$blade->directive('endnavlink', fn() => "</a>");

		$blade->directive('vite', function ($expression = null) use ($vitePort) {
			$output = '';

			if ($expression) {
				$vitePort = trim($expression, " '\"");
			}

			if (env('APP_ENV') === 'development') {
				foreach (get_vite_libs($vitePort) as $item) {
					$output .= $item;
				}
			} else {
				foreach (get_manifest_libs() as $item) {
					$output .= $item;
				}
			}

			return $output;
		});


		$blade->directive(
			'activeif',
			fn($route) =>
			"<?php if (request()->is($route)): echo 'bg-blue-500 text-white'; else: echo 'text-gray-700'; endif; ?>"
		);
	}

	// privates
	public static function getGlobals($currentPath)
	{
		return [
			'currentPath' => $currentPath,
			'appLinks' => Navigation::getAppLinks(),
			'headerLinks' => Navigation::getNavLinks(),
			'appUrl' => env('APP_URL'),
			'appTitle' => env('APP_TITLE'),
		];
	}
}
