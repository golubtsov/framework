<?php

use Framework\Routing\Router;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AdminController;

Router::get('/', NoteController::class, 'index');

Router::get('/notes/(\d+)/edit', NoteController::class, 'edit');
Router::post('/notes/(\d+)/update', NoteController::class, 'update');
Router::get('/notes/create', NoteController::class, 'create');
Router::post('/notes/store', NoteController::class, 'store');
Router::get('/notes/(\d+)/delete', NoteController::class, 'delete');

Router::get('/login', LoginController::class, 'index');
Router::get('/logout', LoginController::class, 'logout');
Router::post('/login', LoginController::class, 'login');

/** ================== */
Router::get('/admin/login', AdminController::class, 'index');
Router::get('/user-info/1', AdminController::class, 'userInfo');

Router::get('/signup', SignupController::class, 'index');
Router::post('/signup', SignupController::class, 'signup');

Router::get('/dashboard', DashboardController::class, 'index');
Router::post('/dashboard/info', DashboardController::class, 'update');

Router::get('/users', UserController::class, 'users');
Router::get('/users/create', UserController::class, 'create');
Router::post('/users/store', UserController::class, 'store');
Router::get('/users/(\d+)/delete', UserController::class, 'delete');
Router::get('/users/(\d+)/edit', UserController::class, 'edit');
Router::post('/users/(\d+)/update', UserController::class, 'update');
