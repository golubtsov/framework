<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\LoginService;
use Framework\Helpers\Auth;
use Framework\Http\Controller\Controller;
use Framework\Http\Request;
use Framework\View\View;

class LoginController extends Controller
{
    public function index(): string
    {
        return View::render('auth.login');
    }

    public function login(Request $request)
    {
        if (LoginService::login($request)) {
            dd(Auth::user());
        }

        dd(false);
    }
}