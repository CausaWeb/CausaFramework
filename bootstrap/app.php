<?php

use App\App;
use Dotenv\Dotenv;

// custom functions
require_once __DIR__ . '/../src/app/Helpers/functions.php';

(Dotenv::createImmutable(__DIR__ . '/../'))->load();

// Blade templating
$blade = require_once __DIR__ . '/../bootstrap/blade.php';

return new App($blade);
