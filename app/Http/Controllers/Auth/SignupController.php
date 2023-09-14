<?php

namespace App\Http\Controllers\Auth;

use App\Services\SignupService;
use Framework\Http\Controller\Controller;
use Framework\Http\Request;
use Framework\View\View;

class SignupController extends Controller
{
    public function index(): string
    {
        return View::render('auth.signup');
    }

    public function signup(Request $request): string
    {
        return SignupService::signup($request) ? View::render('auth.login') : View::render('auth.signup');
    }
}