<?php

namespace App\Http\Controllers;

use Framework\Http\Controller\Controller;
use Framework\View\View;

class PostController extends Controller
{
    public function index(): string
    {
        return View::render('welcome', ['name' => 'Nikita']);
    }

    public function update()
    {
        echo 'Update';
    }
}