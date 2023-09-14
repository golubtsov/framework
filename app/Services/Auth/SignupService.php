<?php

namespace App\Services\Auth;

use App\Models\User;
use Framework\Helpers\Auth;
use Framework\Helpers\Session;
use Framework\Http\Request;
use Framework\Http\Response\Response;

class SignupService
{
    private static array $fields = [
        'name',
        'email',
        'password'
    ];

    private static array $messages = [
        'required' => [
            'name' => 'Укажите свое имя',
            'email' => 'Укажите свой Email',
            'password' => 'Укажите пароль'
        ],
        'unique' => [
            'email' => 'Данный Email уже зарегистрирован'
        ],
        'confirmed' => [
            'password' => 'Пароли не совпадают'
        ]
    ];

    public static function signup(Request $request): bool
    {
        foreach (self::$fields as $field) {
            if (empty($request->getFormData($field))) {
                Session::put('errors', [self::$messages['required'][$field]]);
                Response::redirect('/signup');
            }
        }

        return self::createUser($request->getFormDataAll());
    }

    private static function createUser(array $info): bool
    {
        if (self::checkPassword($info['password'], $info['password_confirmed'])) {
            try {
                return (new User())->create([
                    'name' => $info['name'],
                    'email' => $info['email'],
                    'password' => Auth::hash($info['password'])
                ]);
            } catch (\Exception $exception) {
                if ($exception->getCode() == 23000) {
                    Session::put('errors', [self::$messages['unique']['email']]);
                    Response::redirect('/signup');
                }
            }
        }

        return false;
    }

    private static function checkPassword(string $password, string $confirmed)
    {
        if ($password == $confirmed) {
            return true;
        }

        Session::put('errors', [self::$messages['confirmed']['password']]);
        Response::redirect('/signup');
    }
}