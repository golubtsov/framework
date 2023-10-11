<?php

namespace App\Http\Controllers;

use App\Http\Validates\ValidateUser;
use App\Models\User;
use App\Services\UserService;
use Framework\Helpers\Auth;
use Framework\Http\Controller\Controller;
use Framework\Http\Request;
use Framework\Http\Response\Response;
use Framework\View\View;
use JetBrains\PhpStorm\NoReturn;

class UserController extends Controller
{
    public function __construct()
    {
        if (is_null(Auth::user())) {
            Response::redirect('/login');
        }
    }

    public function users()
    {
        return View::render('users.list', [
            'users' => UserService::users()
        ]);
    }

    public function create()
    {
        return View::render('users.create');
    }

    public function store(Request $request)
    {
        if (UserService::store($request)) {
            Response::redirect('/users');
        }
    }

    public function edit(Request $request)
    {
        $userId = (int)array_reverse(explode('/', $request->getUrl()))[1];

        return View::render('/users.update', [
            'user' => (new User())->find($userId)
        ]);
    }

    public function update(Request $request)
    {
        $userId = (int)array_reverse(explode('/', $request->getUrl()))[1];

        if (UserService::update($userId, $request->getFormDataAll())) {
           Response::redirect('/users');
        }
    }

    #[NoReturn] public function delete(Request $request)
    {
        $userId = (int)array_reverse(explode('/', $request->getUrl()))[1];

        if (UserService::delete($userId)) {
            Response::redirect('/users');
        }

        dd('DB error');
    }
}