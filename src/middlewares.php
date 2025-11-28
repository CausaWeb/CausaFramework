<?php

use App\Middlewares\CsrfToken;

$app->addMiddleware(CsrfToken::class);
