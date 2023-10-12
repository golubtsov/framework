<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\DashboardService;
use Framework\Helpers\Auth;
use Framework\Helpers\Session;
use Framework\Http\Controller\Controller;
use Framework\Http\Request;
use Framework\Http\Response\Response;
use Framework\View\View;

class DashboardController extends Controller
{
    private Request $request;

    public function __construct(Request $request)
    {
        if (is_null(Auth::user())) {
            Response::redirect('/login');
        }

        $this->request = $request;
    }

    public function index(): string
    {
        return View::render('users.update');
    }

    public function update(): void
    {
        if ($this->checkUserDataForUpdate()) {
            Response::redirect('/dashboard');
        }

        if (DashboardService::updateUserData($this->request->getFormDataAll())) {
            Session::remove('user');
            Session::put('user', (new User())->find(Auth::id()));
            Response::redirect('/');
        } else {
            dd('DB error');
        }
    }

    private function checkUserDataForUpdate(): bool
    {
        if (is_null($this->request->getFormData('name'))) {
            return false;
        }

        strip_tags($this->request->getFormData('name'));

        return true;
    }
}