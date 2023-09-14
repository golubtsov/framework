<?php

namespace App\Services\Auth;

use App\Models\User;
use Framework\Helpers\Auth;
use Framework\Helpers\Session;
use Framework\Http\Request;
use Framework\Http\Response\Response;

class LoginService
{
    private static array $fields = [
        'email',
        'password'
    ];

    private static array $messages = [
        'required' => [
            'email' => 'Укажите свой Email',
            'password' => 'Укажите пароль'
        ],
        'notFound' => 'Пользователь с таким Email не найден',
    ];

    public static function login(Request $request)
    {
        foreach (self::$fields as $field) {
            if (empty($request->getFormData($field))) {
                Session::put('errors', [self::$messages['required'][$field]]);
                Response::redirect('/signup');
            }
        }

        return self::checkPassword($request->getFormDataAll());
    }

    public static function checkPassword(array $info)
    {
        if (Auth::attempt($info['email'], $info['password'])) {
            return true;
        }

        Session::put('errors', [self::$messages['notFound']]);
        Response::redirect('/');
    }
}