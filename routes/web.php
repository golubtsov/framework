<?php

use Framework\Routing\Router;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;

Router::get('/', LoginController::class, 'index');
Router::get('/signup', SignupController::class, 'index');
Router::post('/signup', SignupController::class, 'signup');

/**
 * example for route with params
 * Router::get('/posts/(\d+)/update', MainController::class, 'update');
 */
