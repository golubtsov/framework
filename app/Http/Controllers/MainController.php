<?php

namespace App\Http\Controllers;

use Framework\Http\Controller\Controller;
use Framework\Http\Request;
use Framework\View\View;

class MainController extends Controller
{
    public function index(Request $request): bool|string
    {
        return View::render('app');
    }
}