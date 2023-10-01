<?php

namespace App\Models;

use Framework\Database\Model\Model;

class User extends Model
{
    protected string $table = 'users';

    public function update(string $field, int $id): bool
    {
        $res = $this->pdo->query("UPDATE $this->table SET name = '$field' WHERE id = '$id';");

        return !$res ? $res : true;
    }
}