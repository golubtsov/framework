<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\LoginService;
use Framework\Helpers\Auth;
use Framework\Helpers\Session;
use Framework\Http\Controller\Controller;
use Framework\Http\Request;
use Framework\Http\Response\Response;
use Framework\View\View;

class AdminController extends Controller
{
    public function index(): string
    {
        return View::render('auth.admin-login');
    }

    public function userInfo(): string
    {
        return View::render('users.info');
    }

    public function login(Request $request): void
    {
        if (LoginService::login($request)) {
            Response::redirect('/');
        } else {
            Session::put('errors', ['Что-то пошло не так']);
            Response::redirect('/login');
        }
    }

    public function logout(): void
    {
        Auth::logout();
        Response::redirect('/login');
    }
}