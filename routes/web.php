<?php

use Framework\Routing\Router;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;

Router::get('/', NoteController::class, 'index');

Router::get('/notes/(\d+)/edit', NoteController::class, 'edit');
Router::post('/notes/(\d+)/update', NoteController::class, 'update');

Router::get('/notes/create', NoteController::class, 'create');
Router::post('/notes/store', NoteController::class, 'store');

Router::get('/notes/(\d+)/delete', NoteController::class, 'delete');

Router::get('/login', LoginController::class, 'index');
Router::get('/logout', LoginController::class, 'logout');
Router::post('/login', LoginController::class, 'login');

Router::get('/signup', SignupController::class, 'index');
Router::post('/signup', SignupController::class, 'signup');
