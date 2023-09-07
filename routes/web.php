<?php

use Framework\Routing\Router;
use App\Http\Controllers\PostController;

Router::get('/', PostController::class, 'index');
Router::get('/posts/(\d+)/update', PostController::class, 'update');
