<?php

namespace App\Services;

use App\Models\User;
use Framework\Helpers\Auth;
use Framework\Helpers\Session;
use Framework\Http\Request;
use Framework\Http\Response\Response;

class UserService
{
    private static array $fields = [
        'name',
        'email'
    ];

    private static array $messages = [
        'required' => [
            'name' => 'Укажите свое имя',
            'email' => 'Укажите свой Email',
            'password' => 'Укажите пароль'
        ],
        'unique' => [
            'email' => 'Данный Email уже зарегистрирован'
        ]
    ];

    public static function users(): array
    {
        return (new User())->all();
    }

    public static function store(Request $request)
    {
        foreach (self::$fields as $field) {
            if (empty($request->getFormData($field))) {
                Session::put('errors', [self::$messages['required'][$field]]);
                Response::redirect('/users/create');
            }
        }

        return self::createUser($request->getFormDataAll());
    }

    private static function createUser(array $info)
    {
        try {
            return (new User())->create([
                'name' => strip_tags($info['name']),
                'email' => strip_tags($info['email']),
                'password' => Auth::hash('password') // пароль по умолчанию
            ]);
        } catch (\Exception $exception) {
            if ($exception->getCode() == 23000) {
                Session::put('errors', [self::$messages['unique']['email']]);
                Response::redirect('/users/create');
            }
        }

    }

    public static function update(int $id, array $data): bool
    {
        define("BASE_PATH", '/var/www/public/storage/');
        $file_name = '';
        $avatarChange = false;

        $user = (new User())->find($id);

        if (!empty($_FILES['avatar']['name']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
            $file_name = $user->name . '_' . date('d_m_Y') . '.' . explode('/', $_FILES['avatar']['type'])[1];
            move_uploaded_file($_FILES['avatar']['tmp_name'], BASE_PATH . $file_name);
            $avatarChange = true;
        }

        if ($user->email == $data['email'] && $avatarChange) {
            return (new User())->update($user->id, [
                'name' => $data['name'],
                'avatar' => $file_name,
                'status' => $data['status'],
            ]);
        } else {
            return (new User())->update($user->id, [
                'name' => $data['name'],
                'status' => $data['status'],
            ]);
        }

        $existUserEmail = (new User())->where('email', $data['email'])->first();

        if (is_null($existUserEmail) && $avatarChange) {
            return (new User())->update($user->id, [
                'name' => $data['name'],
                'email' => $data['email'],
                'avatar' => $file_name,
                'status' => $data['status'],
            ]);
        } else {
            return (new User())->update($user->id, [
                'name' => $data['name'],
                'email' => $data['email'],
                'status' => $data['status'],
            ]);
        }

        if ($user->id != $existUserEmail->id) {
            Session::put('errors', ['Пользователь с таким Email уже существует']);
            Response::redirect('/users/' . $user->id . '/edit');
        }
    }

    public static function delete(int $id): bool
    {
        $user = (new User())->find($id);

        if (is_null($user)) {
            dd('Пользователь не найден');
        }

        return (new User())->delete($user->id);
    }
}