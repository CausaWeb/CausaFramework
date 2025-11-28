<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

// Create app instance
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Middlewares
require_once __DIR__ . '/../src/middlewares.php';

// Routes
require_once __DIR__ . '/../src/routes/web.php';

// Dispatch
$app->dispatch();
