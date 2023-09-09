<?php

namespace App\Http\Controllers;

use Framework\Http\Controller\Controller;
use Framework\Http\Response\Response;
use Framework\View\View;

class MainController extends Controller
{
    public function index(): bool|string
    {
        return View::render('welcome');
    }
}