<?php

namespace App\Services;

use App\Models\User;
use Framework\Helpers\Auth;

class DashboardService
{
    public static function updateUserData(array $data): bool
    {
        $user = new User();

        return $user->update($data['name'], Auth::id());
    }
}