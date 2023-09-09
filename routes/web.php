<?php

use Framework\Routing\Router;
use App\Http\Controllers\MainController;

Router::get('/', MainController::class, 'index');

/**
 * example for route with params
 * Router::get('/posts/(\d+)/update', MainController::class, 'update');
 */
