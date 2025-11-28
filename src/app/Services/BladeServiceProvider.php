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
			if ($expression) {
				$vitePort = trim($expression, " '\"");
			}

			return <<<EOT
<?php if (env('APP_ENV') === 'development'): ?>
    <script type="module" src="http://localhost:{$vitePort}/@vite/client"></script>
    <script type="module" src="http://localhost:{$vitePort}/src/assets/js/app.js"></script>
    <link rel="stylesheet" href="http://localhost:{$vitePort}/src/assets/css/app.css">
<?php else: ?>
    <?php
        // Manifest now lives in public/assets/.vite/manifest.json
        \$manifestPath = public_path('assets/.vite/manifest.json');
        \$manifest = file_exists(\$manifestPath)
            ? json_decode(file_get_contents(\$manifestPath), true)
            : [];

        \$jsFile = \$manifest['src/assets/js/app.js']['file'] ?? null;
        \$cssFile = \$manifest['src/assets/css/app.css']['file'] ?? null;
    ?>
    <?php if (\$jsFile): ?>
        <script type="module" src="/assets/<?= \$jsFile ?>"></script>
    <?php endif; ?>
    <?php if (\$cssFile): ?>
        <link rel="stylesheet" href="/assets/<?= \$cssFile ?>">
    <?php endif; ?>
<?php endif; ?>
EOT;
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
