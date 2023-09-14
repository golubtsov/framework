<?php

namespace App\Http\Controllers\Auth;

use Framework\Http\Controller\Controller;
use Framework\View\View;

class LoginController extends Controller
{
    public function index(): string
    {
        return View::render('auth.login');
    }
}